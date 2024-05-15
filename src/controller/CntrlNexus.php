<?php

declare(strict_types=1);

namespace Nexus_gathering\controller;

use Nexus_gathering\dao\DaoNexus;
use Nexus_gathering\metier\CreationUser;
use Nexus_gathering\metier\Messages;
use SebastianBergmann\Type\NullType;

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
        $jeux = $this->DaoNexus->getAll();
        require './view/recherche_de_joueur/recherche_rapide.php';
    }
    public function getRechercheRapideResultat()
    {
        // $id_jeu             = htmlspecialchars(trim($_GET['id']));

        // $id_jeu = (int)$id_jeu;     // conversion en int

        // $jeu = $this->DaoNexus->getById($id_jeu);

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
    

    // public function createMessage() {
    //     header('Content-Type: application/json');  // S'assurer que la réponse est en JSON
    
    //     // Vérification de la session de l'utilisateur
    //     if (!isset($_SESSION['user'])) {
    //         echo json_encode(['status' => 'error', 'message' => 'Utilisateur non authentifié.']);
    //         exit;
    //     }
    
    //     // Récupération des valeurs nécessaires depuis $_POST
    //     $idExpediteur = $_SESSION['user']->getId();  // Assure-toi que l'objet user a une méthode getId()
    //     $contenu_mess = $_POST['message'] ?? '';
    //     $idDestinataire = isset($_POST['dest_id']) ? (int) $_POST['dest_id'] : null;
    
    //     // Vérification des données
    //     if (!empty($contenu_mess) && $idExpediteur && $idDestinataire) {
    //         $message = new Messages(null, $contenu_mess, false, $idExpediteur, $idDestinataire, null);
    //         $result = $this->DaoNexus->createMessage($message);
    
    //         if ($result) {
    //             echo json_encode(['status' => 'success', 'message' => 'Message envoyé avec succès.']);
    //         } else {
    //             echo json_encode(['status' => 'error', 'message' => 'Erreur lors de l\'envoi du message.']);
    //         }
    //         exit;
    //     }
    // }

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
    
            if ($result) {
                echo json_encode(['status' => 'success', 'message' => 'Message envoyé avec succès.', 'nomUtilisateur' => $nomUtilisateur]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Erreur lors de l\'envoi du message.']);
            }
            exit;
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Le message ne peut pas être vide, et les ID de l\'expéditeur et du destinataire doivent être fournis.']);
            exit;
        }
    }


    public function deleteMessage() {
        if (isset($_POST['message_id'], $_POST['conversation_id'])) {
            $messageId = (int) $_POST['message_id'];
            $conversationId = (int) $_POST['conversation_id'];
            $message = new Messages($messageId, '', false, 0, 0, null);
    
            if ($this->DaoNexus->deleteMessage($message)) {
                // Redirection vers la conversation actuelle
                header('Location: ' . APP_ROOT . '/messagerie/contact?id=' . $conversationId . '&status=success&message=Message supprimé');
            } else {
                // Gestion de l'erreur, rester sur la même page
                header('Location: ' . APP_ROOT . '/messagerie/contact?id=' . $conversationId . '&status=error&message=Erreur lors de la suppression');
            }
        } else {
            // ID de message ou de conversation non fourni
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
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Erreur lors de la mise à jour']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Informations manquantes']);
        }
        exit;
    }
    
    
    
    
}