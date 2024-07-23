<?php

declare(strict_types=1);

namespace Nexus_gathering\controller;

use Nexus_gathering\dao\DaoNexus;
use Nexus_gathering\metier\CreationUser;
use Nexus_gathering\metier\Messages;
use SebastianBergmann\Type\NullType;
use Nexus_gathering\metier\Jeu;
use Nexus_gathering\metier\Studio;
use Nexus_gathering\metier\Editeur;


class CntrlNexus{

    public function __construct(
        private DaoNexus $DaoNexus = new DaoNexus()
    ) {
    }

    public function getIndex()
    {
        require './view/index.php';
    }
    public function getRechercheDeJoueur()
    {
        require './view/recherche_de_joueur/recherche_de_joueurs.php';
    }
    public function getRechercheRapide()
    {
        $jeux = $this->DaoNexus->getAllGamesForCarousel();

        require './view/recherche_de_joueur/recherche_rapide.php';
    }
    public function getRechercheRapideResultat()
    {


        require './view/recherche_de_joueur/recherche_rapide_resultat.php';
    }
    public function getRechercheParAnnonce()
    {
        require './view/recherche_de_joueur/recherche_par_annonce.php';
    }
    public function getRejoindreUneAnnonce()
    {
        require './view/recherche_de_joueur/rejoindre_une_annonce.php';
    }
    public function getCreationAnnonce()
    {
        require './view/recherche_de_joueur/creation_annonce.php';
    }
    public function getMessagerie()
    {      
        $creationUser = $_SESSION["user"];
        if (!isset($creationUser)) { 
            header('Location: login.php'); 
            exit;
        }
        $contacts = $this->DaoNexus->getUserConversations($creationUser);
        require './view/recherche_de_joueur/messagerie.php';
    }
    
    public function getConversation()
    {
        $creationUser = $_SESSION["user"];
        if (!isset($creationUser)) { 
            header('Location: login.php'); 
            exit;
        }
        $selectedContactName = "";
        $selectedContactAvatar = "";
        $messages = [];
        if (isset($_GET['id'])) {
            $contacts = $this->DaoNexus->getUserConversations($creationUser);
            $idContact = htmlspecialchars(trim($_GET['id']));
            $idContact = (int)$idContact;  // conversion en int
            $messages = $this->DaoNexus->getConversationMessages($creationUser->getId(), $idContact);
            $selectedContactName = $this->DaoNexus->getContactNameById($idContact);
            $selectedContactAvatar = $this->DaoNexus->getContactAvatarById($idContact);

        }
        require './view/recherche_de_joueur/messagerie.php';
    }
    

    public function createMessage() {
        header('Content-Type: application/json');
    
        if (!isset($_SESSION['user'])) {
            echo json_encode(['status' => 'error', 'message' => 'Utilisateur non authentifié.']);
            exit;
        }

        $idExpediteur = $_SESSION['user']->getId();
        $nomUtilisateur = $_SESSION['user']->getNom(); // Assure-toi que cette méthode existe et retourne le nom
    
        $contenu_mess = $_POST['message'] ?? '';
        $idDestinataire = isset($_POST['dest_id']) ? (int) $_POST['dest_id'] : null;
    
        if (!empty($contenu_mess) && $idExpediteur && $idDestinataire) {
            $message = new Messages(null, $contenu_mess, false, $idExpediteur, $idDestinataire, null);
            $result = $this->DaoNexus->createMessage($message);
    
            if ($result [0]) {
                echo json_encode(['success' => true, 'message' => 'Message envoyé avec succès.', 'nomUtilisateur' => $nomUtilisateur, 'destinataire' => $idDestinataire, 'message_id' => $result[1]]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'envoi du message.']);
            }
            exit;
        } else {
            echo json_encode(['success' => false, 'message' => 'Le message ne peut pas être vide, et les ID de l\'expéditeur et du destinataire doivent être fournis.']);
            exit;
        }
    }


    public function deleteMessage() {
        if (isset($_POST['message_id'], $_POST['conversation_id'])) {
            $messageId = (int) $_POST['message_id'];
            $conversationId = (int) $_POST['conversation_id'];
            $message = new Messages($messageId, '', false, 0, 0, null);
    
            if ($this->DaoNexus->deleteMessage($message)) {
                header('Location: ' . APP_ROOT . '/messagerie/contact?id=' . $conversationId . '&status=success&message=Message supprimé');
            } else {
                header('Location: ' . APP_ROOT . '/messagerie/contact?id=' . $conversationId . '&status=error&message=Erreur lors de la suppression');
            }
        } else {
            header('Location: ' . APP_ROOT . '/messagerie?status=error&message=Informations manquantes');
        }
        exit;
    }
    
    public function updateMessage() {
        header('Content-Type: application/json');
        if (isset($_POST['message_id'], $_POST['message'])) {
            $messageId = (int) $_POST['message_id'];
            $contenu_mess = trim($_POST['message']);
            $idExpediteur = $_SESSION['user']->getId();
            $idDestinataire = isset($_POST['dest_id']) ? (int) $_POST['dest_id'] : null;
            $modif = false;
    
            $message = new Messages($messageId, $contenu_mess, $modif, $idExpediteur, $idDestinataire, null);
    
            if ($this->DaoNexus->updateMessage($message)) {
                echo json_encode(['success' => true, 'message_id' => $messageId, 'contenu_mess' => $contenu_mess]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Erreur lors de la mise à jour']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Informations manquantes']);
        }
        exit;
    }
    
    // Bibliothéque

    public function getAccueilBibliotheque()
    {
        require '.\view\bibliotheques\vaccueilbiblio.php';
    }
    
    public function getBibliothequeGenerale()
    {
        require '.\view\bibliotheques\vbibliogenerale.php';
    }

    public function getAjoutBiblioGenerale()
    {
        require '.\view\bibliotheques\vajoutbibliogenerale.php';
    }

    public function getPageJeu()
    {
        require '.\view\bibliotheques\vpagejeu.php';
    }

// Actions pour les jeux

public function createJeu() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validation des champs de formulaire
        $nom_jeu = $_POST['nom_jeu'] ?? '';
        $resum_jeu = $_POST['resum_jeu'] ?? '';
        $img_jeu = $_FILES['img_jeu']['name'] ?? '';
        $multi = isset($_POST['multi']) && $_POST['multi'] === '1';

        // Vérification des champs obligatoires
        if (empty($nom_jeu) || empty($resum_jeu) || empty($img_jeu)) {
            header('Location: ' . APP_ROOT . '/view/error.php?error=missing_fields');
            exit;
        }

        // Déplacer l'image téléchargée vers le répertoire approprié
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($img_jeu);

        if (!move_uploaded_file($_FILES['img_jeu']['tmp_name'], $target_file)) {
            error_log("Échec du téléchargement du fichier: " . $_FILES['img_jeu']['error']);
            header('Location: ' . APP_ROOT . '/view/error.php?error=upload_failed');
            exit;
        }

        // Création de l'objet Jeu
        $jeu = new Jeu(
            0, // Remplacez null par 0 ou une autre valeur par défaut
            $nom_jeu,
            $multi,
            $resum_jeu,
            $target_file,
            0, // ID éditeur par défaut
            0, // ID utilisateur par défaut
            0  // ID studio par défaut
        );

        // Appel à la méthode create du DAO
        if ($this->DaoNexus->create($jeu)) {
            header('Location: ' . APP_ROOT . '/view/success.php');
        } else {
            header('Location: ' . APP_ROOT . '/view/error.php?error=creation_jeu_failed');
        }
        exit;
    }
}

public function getJeuById(int $id_jeu) {
    $jeu = $this->DaoNexus->getById($id_jeu);
    if ($jeu) {
        require './view/jeu_detail.php';
    } else {
        header('Location: ' . APP_ROOT . '/view/error.php?error=jeu_not_found');
        exit;
    }
}

public function getAllJeux() {
    $jeux = $this->DaoNexus->getAll();
    require './view/jeux_list.php';
}

public function updateJeu() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $jeu = new Jeu(
            (int)$_POST['id_jeu'],
            $_POST['nom_jeu'],
            isset($_POST['multi']) && $_POST['multi'] === '1',
            $_POST['resum_jeu'],
            $_POST['img_jeu'],
            (int)$_POST['id_ed'],
            (int)$_POST['id_user'],
            (int)$_POST['id_stu']
        );

        if ($this->DaoNexus->update($jeu, new Studio($_POST['id_stu']), new Editeur($_POST['id_ed']))) {
            header('Location: ' . APP_ROOT . '/view/success.php');
        } else {
            header('Location: ' . APP_ROOT . '/view/error.php?error=update_jeu_failed');
        }
        exit;
    }
}

public function deleteJeu() {
    $id_jeu = $_POST['id_jeu']; // Récupère l'ID du jeu à partir des données POST
    if ($this->DaoNexus->delete($id_jeu)) {
        header('Location: ' . APP_ROOT . '/view/success.php');
    } else {
        header('Location: ' . APP_ROOT . '/view/error.php?error=delete_jeu_failed');
    }
    exit;
}

// Commenté : Méthodes liées aux studios et éditeurs
/*
public function createStudio() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $studio = new Studio(null, $_POST['nom_stu'], (int)$_POST['id_ed']);
        if ($this->DaoNexus->createStudio($studio)) {
            header('Location: ' . APP_ROOT . '/view/success.php');
        } else {
            header('Location: ' . APP_ROOT . '/view/error.php?error=creation_studio_failed');
        }
        exit;
    }
}

public function getStudioById(int $id_stu) {
    $studio = $this->DaoNexus->getByIdStudio($id_stu);
    if ($studio) {
        require './view/studio_detail.php';
    } else {
        header('Location: ' . APP_ROOT . '/view/error.php?error=studio_not_found');
        exit;
    }
}

public function getAllStudios() {
    $studios = $this->DaoNexus->getAllStudio();
    require './view/studios_list.php';
}

public function updateStudio() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $studio = new Studio((int)$_POST['id_stu'], $_POST['nom_stu'], (int)$_POST['id_ed']);
        if ($this->DaoNexus->updateStudio($studio)) {
            header('Location: ' . APP_ROOT . '/view/success.php');
        } else {
            header('Location: ' . APP_ROOT . '/view/error.php?error=update_studio_failed');
        }
        exit;
    }
}

public function deleteStudio(int $id_stu) {
    if ($this->DaoNexus->deleteStudio($id_stu)) {
        header('Location: ' . APP_ROOT . '/view/success.php');
    } else {
        header('Location: ' . APP_ROOT . '/view/error.php?error=delete_studio_failed');
    }
    exit;
}

public function createEditeur() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $editeur = new Editeur(null, $_POST['nom_ed']);
        if ($this->DaoNexus->createEditeur($editeur)) {
            header('Location: ' . APP_ROOT . '/view/success.php');
        } else {
            header('Location: ' . APP_ROOT . '/view/error.php?error=creation_editeur_failed');
        }
        exit;
    }
}

public function getEditeurById(int $id_ed) {
    $editeur = $this->DaoNexus->getByIdEditeur($id_ed);
    if ($editeur) {
        require './view/editeur_detail.php';
    } else {
        header('Location: ' . APP_ROOT . '/view/error.php?error=editeur_not_found');
        exit;
    }
}

public function getAllEditeurs() {
    $editeurs = $this->DaoNexus->getAllEditeur();
    require './view/editeurs_list.php';
}

public function updateEditeur() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $editeur = new Editeur((int)$_POST['id_ed'], $_POST['nom_ed']);
        if ($this->DaoNexus->updateEditeur($editeur)) {
            header('Location: ' . APP_ROOT . '/view/success.php');
        } else {
            header('Location: ' . APP_ROOT . '/view/error.php?error=update_editeur_failed');
        }
        exit;
    }
}

public function deleteEditeur(int $id_ed) {
    if ($this->DaoNexus->deleteEditeur($id_ed)) {
        header('Location: ' . APP_ROOT . '/view/success.php');
    } else {
        header('Location: ' . APP_ROOT . '/view/error.php?error=delete_editeur_failed');
    }
    exit;
}
*/
}