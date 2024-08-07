<?php

declare(strict_types=1);

namespace Nexus_gathering\dao;

use PDO;
use Nexus_gathering\dao\Database;
use Nexus_gathering\dao\DaoException;
use Nexus_gathering\dao\Requetes;
use Nexus_gathering\metier\Jeu;
use Nexus_gathering\metier\Messages;
use Nexus_gathering\metier\Annonce;
use Nexus_gathering\metier\RechercheRapide;
use Nexus_gathering\metier\Editeur;
use Nexus_gathering\metier\Formats;
use Nexus_gathering\metier\Genre;
use Nexus_gathering\metier\Plateforme;
use Nexus_gathering\metier\Studio;
use Nexus_gathering\metier\CreationUser;
use Nexus_gathering\metier\RoleUtilisateur;
use Nexus_gathering\metier\NiveauUtilisateur;
use Nexus_gathering\metier\Utilisateur;
use Nexus_gathering\metier\Contributeur;
use Nexus_gathering\metier\Admin; 
use Nexus_gathering\metier\Quiz;
use Nexus_gathering\metier\Question;
use Nexus_gathering\metier\Reponse;
use Nexus_gathering\metier\Categorie;
use Nexus_gathering\metier\DTOUser;
use Nexus_gathering\metier\JouerQuiz;
use Nexus_gathering\metier\Conversation;   


class DaoNexus {
    
    private \PDO $conn;

    public function __construct(\PDO $conn = null) {
        $this->conn = $conn ?: Database::getConnection();
    }
    
    //      ---MESSAGERIE---

    public function createMessage(Messages $message) {
        $query = Requetes::INSERT_MESSAGE;
        $id_message = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $message->getContenuMess(), PDO::PARAM_STR);
            $stmt->bindValue(2, $message->getIdExped(), PDO::PARAM_INT);
            $stmt->bindValue(3, $message->getIdDesti(), PDO::PARAM_INT);
            $stmt->bindValue(4, $message->getModif(), PDO::PARAM_BOOL);
            $stmt->execute();
            $id_message = $this->conn -> lastInsertId();
        } catch (\PDOException $e) {
            error_log('Insert Message Error: ' . $e->getMessage());
            return false;
        }
        return [true, $id_message];
    }
    
    
    public function getConversationMessages($idUser, $idContact) {
        $query = Requetes::SELECT_CONV;
        try {
            $stmt = $this->conn->prepare($query);
            // Liaison des paramètres pour les deux sens de la conversation
            $stmt->bindValue(1, $idUser, \PDO::PARAM_INT);
            $stmt->bindValue(2, $idContact, \PDO::PARAM_INT);
            $stmt->bindValue(3, $idContact, \PDO::PARAM_INT);
            $stmt->bindValue(4, $idUser, \PDO::PARAM_INT);
            $stmt->execute();
    
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw DaoException::fromFetchConversationsPDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromFetchConversationsException($e);
        }
    }

    //TODO a remettre au propre 

    public function getContactNameById($idContact) {
        $query = Requetes::SELECT_CONTACT_NAME;
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idContact', $idContact, \PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result ? $result['nom_user'] : "Nom inconnu"; // Retourne le nom par défaut
    }

        //TODO a remettre au propre 

    public function getContactAvatarById($idContact) {
        $query = Requetes::SELECT_CONTACT_AVATAR;
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idContact', $idContact, \PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result ? $result['avatar'] : '/assets/Icone/user-solid blanc.svg'; // Retourne l'avatar par défaut
    }
    

    public function getUserConversations(DTOUser $creationUser) {
        $query = Requetes::SELECT_CONTACT;
        $conversations = array();  // Tableau pour stocker les objets Conversation
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':userId', $creationUser->getId(), \PDO::PARAM_INT);
            $stmt->execute();
    
            while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
                // Création d'un objet Conversation à partir de la ligne de la base de données

                $conversation = new Conversation($row->id_user, $row->nom_user, $row->avatar, $row->last_message_date);
                array_push($conversations, $conversation);
            }
    
            return $conversations;
        } catch (\PDOException $e) {
            throw DaoException::fromFetchUserConversationsException($e);
        } catch (\Exception $e) {
            throw DaoException::fromFetchUserConversationsException($e);
        }
    }
    
    
    public function updateMessage(Messages $messages) {
        $query = Requetes::UPDATE_MESSAGE;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $messages->getContenuMess(), \PDO::PARAM_STR);
            $stmt->bindValue(2, $messages->getIdMessage(), \PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->rowCount() > 0;
        } catch (\PDOException $e) {
            throw DaoException::fromUpdateMessagePDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromUpdateMessageException($e);
        }
    }

    public function deleteMessage(Messages $messages) {
        $query = Requetes::DELETE_MESSAGE;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $messages->getIdMessage(), \PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->rowCount() > 0;
        } catch (\PDOException $e) {
            throw DaoException::fromDeleteMessagePDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromDeleteMessageException($e);
        }
    }
    
    //          ---RECHERCHE RAPIDE---

    public function addRechercheRapide(CreationUser $creationUser, Jeu $jeu) {
        $query = Requetes::INSERT_RECHERCHE_RAPIDE;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $creationUser->getIdUser(), PDO::PARAM_INT);
            $stmt->bindValue(2, $jeu->getId_jeu(), PDO::PARAM_INT);
            
            return $stmt->execute();
        } catch (\PDOException $e) {
            throw DaoException::fromCreateRechercheRapidePDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromCreateRechercheRapideException($e);
        }
    }

    public function getRechercheRapideByJeu(Jeu $jeu) {
        $query = Requetes::SELECT_RECHERCHE_RAPIDE;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $jeu->getId_jeu(), PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw DaoException::fromFetchRechercheRapidePDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromFetchRechercheRapideException($e);
        }
    }

    //TODO a clear

    public function getAllGamesForCarousel(): array {
        $query = Requetes::SELECT_CARROUSSEL;
        $jeux = [];
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute(); // Exécuter la requête
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                // Traitement des valeurs NULL pour les arguments de la construction de Jeu
                $resume = isset($row['resum_jeu']) ? $row['resum_jeu'] : ''; // Valeur par défaut si le champ est NULL
                $img = isset($row['img_jeu']) ? $row['img_jeu'] : ''; // Valeur par défaut si le champ est NULL
                $id_ed = isset($row['id_ed']) ? (int)$row['id_ed'] : 0; // Valeur par défaut si le champ est NULL
                $id_user = isset($row['id_user']) ? (int)$row['id_user'] : 0; // Valeur par défaut si le champ est NULL
                $id_stu = isset($row['id_stu']) ? (int)$row['id_stu'] : 0; // Valeur par défaut si le champ est NULL
                $multi = isset($row['multi']) ? (bool)$row['multi'] : false; // Assurez-vous que c'est un booléen
                // Création de l'objet Jeu en prenant en compte les valeurs par défaut
                $jeux[] = new Jeu($row['id_jeu'], $row['nom_jeu'], $multi, $resume, $img, $id_ed, $id_user, $id_stu);
            }
        } catch (\PDOException $e) {
            throw DaoException::fromFetchAllJeuxPDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromFetchAllJeuxException($e);
        }
        return $jeux;
    }
    

    public function updateRechercheRapide(Jeu $jeu, RechercheRapide $rechercheRapide) {
        $query = Requetes::UPDATE_RECHERCHE_RAPIDE;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $jeu->getId_jeu(), PDO::PARAM_INT);
            $stmt->bindValue(2, $rechercheRapide->getIdSession(), PDO::PARAM_INT);
            
            return $stmt->execute();
        } catch (\PDOException $e) {
            throw DaoException::fromUpdateRechercheRapidePDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromUpdateRechercheRapideException($e);
        }
    }

    public function endRechercheRapide(RechercheRapide $rechercheRapide) {
        $query = Requetes::END_RECHERCHE_RAPIDE;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $rechercheRapide->getIdSession(), PDO::PARAM_INT);
            
            return $stmt->execute();
        } catch (\PDOException $e) {
            throw DaoException::fromEndRechercheRapidePDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromEndRechercheRapideException($e);
        }
    }
    
    public function deleteRechercheRapide(RechercheRapide $rechercheRapide) {
        $query = Requetes::DELETE_RECHERCHE_RAPIDE;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $rechercheRapide->getIdSession(), PDO::PARAM_INT);
            
            return $stmt->execute();
        } catch (\PDOException $e) {
            throw DaoException::fromDeleteRechercheRapidePDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromDeleteRechercheRapideException($e);
        }
    }

    //          ---ANNONCE---

    // Création d'une annonce
    public function createAnnonce(Annonce $annonce, CreationUser $creationUser, Jeu $jeu) {
        $query = Requetes::CREATE_ANNONCE;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $annonce->getNomAnnonce(), PDO::PARAM_STR);
            $stmt->bindValue(2, $annonce->getNbUser(), PDO::PARAM_INT);
            $stmt->bindValue(3, $annonce->getDescAnnonce(), PDO::PARAM_STR);
            $stmt->bindValue(4, $creationUser->getIdUser(), PDO::PARAM_INT);
            $stmt->bindValue(5, $jeu->getId_jeu(), PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->rowCount() > 0;
        } catch (\PDOException $e) {
            throw DaoException::fromCreateAnnoncePDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromCreateAnnonceException($e);
        }
    }

    // Lecture d'une annonce par ID
    public function readAnnonce(Annonce $annonce) {
        $query = Requetes::READ_ANNONCE;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$annonce->getIdAnnonce()]);
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw DaoException::fromFetchAnnoncePDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromFetchAnnonceException($e);
        }
    }
    
    // Lecture de toutes les annonces
    public function readAllAnnonces() {
        $query = Requetes::READ_ALL_ANNONCE; 
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw DaoException::fromFetchAllAnnoncesPDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromFetchAllAnnoncesException($e);
        }
    }

    // Mise à jour d'une annonce
    public function updateAnnonce(Annonce $annonce, CreationUser $creationUser, Jeu $jeu) {
        $query = Requetes::UPDATE_ANNONCE;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $annonce->getNomAnnonce(), PDO::PARAM_STR);
            $stmt->bindValue(2, $annonce->getNbUser(), PDO::PARAM_INT);
            $stmt->bindValue(3, $annonce->getDescAnnonce(), PDO::PARAM_STR);
            $stmt->bindValue(4, $creationUser->getIdUser(), PDO::PARAM_INT);
            $stmt->bindValue(5, $jeu->getId_Jeu(), PDO::PARAM_INT);
            $stmt->bindValue(6, $annonce->getIdAnnonce(), PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->rowCount() > 0;
        } catch (\PDOException $e) {
            throw DaoException::fromUpdateAnnoncePDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromUpdateAnnonceException($e);
        }
    }

    // Suppression d'une annonce
    public function deleteAnnonce(Annonce $annonce) {
        $query = Requetes::DELETE_ANNONCE;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $annonce->getIdAnnonce(), PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->rowCount() > 0;
        } catch (\PDOException $e) {
            throw DaoException::fromDeleteAnnoncePDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromDeleteAnnonceException($e);
        }
    }

    //           ---JEU---

        // Création d'un jeu

    public function create(Jeu $jeu): bool {
        $query = Requetes::INSERT_JEU; // Assurez-vous que cette requête est correcte
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':nom_jeu', $jeu->getNom_jeu());
            $stmt->bindValue(':resum_jeu', $jeu->getResum_jeu());
            $stmt->bindValue(':img_jeu', $jeu->getImg_jeu());
            $stmt->bindValue(':multi', $jeu->getMulti() ? 1 : 0, \PDO::PARAM_INT); // Conversion pour la base de données
            $stmt->bindValue(':date_sortie', $jeu->getDateSortie()); // Assurez-vous que ce champ est lié
            $stmt->bindValue(':style', $jeu->getStyle()); // Assurez-vous que ce champ est lié
            return $stmt->execute();
        } catch (\PDOException $e) {
            throw DaoException::fromCreateJeuPDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromCreateJeuException($e);
        }
    }

    // Lecture d'un jeu par ID

    public function getById(int $id_jeu): ?Jeu {
        $query = Requetes::SELECT_JEU; // Assurez-vous que cette requête est correcte
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':id_jeu', $id_jeu, \PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);
            if (!$row) {
                return null;
            }
            $multi = isset($row['multi']) ? (bool)$row['multi'] : false; // Assurez-vous que c'est un booléen
            $id_ed = isset($row['id_ed']) ? (int)$row['id_ed'] : 0; // Valeur par défaut si le champ est NULL
            $id_user = isset($row['id_user']) ? (int)$row['id_user'] : 0; // Valeur par défaut si le champ est NULL
            $id_stu = isset($row['id_stu']) ? (int)$row['id_stu'] : 0; // Valeur par défaut si le champ est NULL
            return new Jeu(
                $row['id_jeu'],
                $row['nom_jeu'],
                $multi,
                $row['resum_jeu'],
                $row['img_jeu'],
                $id_ed,
                $id_user,
                $id_stu,
                $row['date_sortie'],
                $row['style']
            );
        } catch (\PDOException $e) {
            throw DaoException::fromFetchJeuPDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromFetchJeuException($e);
        }
    }

        // Lecture de touts les jeux

        public function getAllJeux(): array {
            $query = Requetes::SELECT_ALL_JEU;
            $jeux = [];
            try {
                $stmt = $this->conn->prepare($query);
                $stmt->execute(); // Exécuter la requête
                while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                    // Traitement des valeurs NULL pour les arguments de la construction de Jeu
                    $resume = isset($row['resum_jeu']) ? $row['resum_jeu'] : ''; // Valeur par défaut si le champ est NULL
                    $img = isset($row['img_jeu']) ? $row['img_jeu'] : ''; // Valeur par défaut si le champ est NULL
                    $id_ed = isset($row['id_ed']) ? (int)$row['id_ed'] : 0; // Valeur par défaut si le champ est NULL
                    $id_user = isset($row['id_user']) ? (int)$row['id_user'] : 0; // Valeur par défaut si le champ est NULL
                    $id_stu = isset($row['id_stu']) ? (int)$row['id_stu'] : 0; // Valeur par défaut si le champ est NULL
                    $multi = isset($row['multi']) ? (bool)$row['multi'] : false; // Assurez-vous que c'est un booléen
                    $date_sortie = isset($row['date_sortie']) ? $row['date_sortie'] : ''; // Valeur par défaut si le champ est NULL
                    $style = isset($row['style']) ? $row['style'] : ''; // Valeur par défaut si le champ est NULL
                    // Création de l'objet Jeu en prenant en compte les valeurs par défaut
                    $jeux[] = new Jeu($row['id_jeu'], $row['nom_jeu'], $multi, $resume, $img, $id_ed, $id_user, $id_stu, $date_sortie, $style);
                }
            } catch (\PDOException $e) {
                throw DaoException::fromFetchAllJeuxPDOException($e);
            } catch (\Exception $e) {
                throw DaoException::fromFetchAllJeuxException($e);
            }
            return $jeux;
        }
        

    // Mise à jour d'un jeu

    public function update(Jeu $jeu, Studio $studio, Editeur $editeur): bool {
        $query = Requetes::UPDATE_JEU;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':nom_jeu', $jeu->getNom_jeu());
            $stmt->bindValue(':resum_jeu', $jeu->getResum_jeu());
            $stmt->bindValue(':img_jeu', $jeu->getImg_jeu());
            $stmt->bindValue(':multi', $jeu->getMulti() ? 1 : 0, \PDO::PARAM_INT); // Conversion pour la base de données
            // Commenté : $stmt->bindValue(':id_ed', $editeur->getId_ed(), \PDO::PARAM_INT);
            // Commenté : $stmt->bindValue(':id_stu', $studio->getId_stu(), \PDO::PARAM_INT);
            $stmt->bindValue(':id_jeu', $jeu->getId_jeu(), \PDO::PARAM_INT);
            return $stmt->execute();
        } catch (\PDOException $e) {
            throw DaoException::fromUpdateJeuPDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromUpdateJeuException($e);
        }
    }

    // Suppression d'un jeu

    public function delete(int $id_jeu): bool {
        $query = "DELETE FROM jeu WHERE id_jeu = :id_jeu"; // Assurez-vous que cette requête est correcte
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':id_jeu', $id_jeu, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount() > 0;
        } catch (\PDOException $e) {
            throw DaoException::fromDeleteJeuPDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromDeleteJeuException($e);
        }
    }

        // Création d'un studio

    public function createStudio(Studio $studio): bool {
        $query = Requetes::INSERT_STUDIO;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':nom_stu', $studio->getNom_stu());
            $stmt->bindValue(':id_ed', $studio->getId_ed(), \PDO::PARAM_INT);
            return $stmt->execute();
        } catch (\PDOException $e) {
            throw DaoException::fromCreateStudioPDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromCreateStudioException($e);
        }
    }

    // Lecture d'un studio par ID

    public function getByIdStudio(int $id_stu): ?Studio {
        $query = Requetes::SELECT_STUDIO;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':id_stu', $id_stu, \PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);
            if (!$row) {
                return null;
            }
            return new Studio($row['id_stu'], $row['nom_stu'], $row['id_ed']);
        } catch (\PDOException $e) {
            throw DaoException::fromFetchStudioPDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromFetchStudioException($e);
        }
    }

        // Lecture de touts les studios

    public function getAllStudio(): array {
        $query = Requetes::SELECT_ALL_STUDIO;
        try{
            $stmt = $this->conn->prepare($query);
            $studios = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $studios[] = new Studio($row['id_stu'], $row['nom_stu'], $row['id_ed']);
            }
            return $studios;
        } catch (\PDOException $e) {
            throw DaoException::fromFetchAllStudiosPDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromFetchAllStudiosException($e);
        }
    }

    // Mise à jour d'un studio

    public function updateStudio(Studio $studio): bool {
        $query = Requetes::UPDATE_STUDIO;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':nom_stu', $studio->getNom_stu());
            $stmt->bindValue(':id_ed', $studio->getId_ed(), \PDO::PARAM_INT);
            $stmt->bindValue(':id_stu', $studio->getId_stu(), \PDO::PARAM_INT);
            return $stmt->execute();
        } catch (\PDOException $e) {
            throw DaoException::fromUpdateStudioPDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromUpdateStudioException($e);
        }
    }

    // Suppression d'un studio

    public function deleteStudio(int $id_stu): bool {
        $query = Requetes::DELETE_STUDIO;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':id_stu', $id_stu, \PDO::PARAM_INT);
            return $stmt->execute();
        } catch (\PDOException $e) {
            throw DaoException::fromDeleteStudioPDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromDeleteStudioException($e);
        }
    }

        // Création d'un editeur

    public function createEditeur(Editeur $editeur): bool {
        $query = Requetes::INSERT_EDITEUR;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':nom_ed', $editeur->getNom_ed());
            return $stmt->execute();
        } catch (\PDOException $e) {
            throw DaoException::fromCreateEditeurPDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromCreateEditeurException($e);
        }
    }

    // Lecture d'un editeur par ID

    public function getByIdEditeur(int $id_ed): ?Editeur {
        $query = Requetes::SELECT_EDITEUR;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':id_ed', $id_ed, \PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);
            if (!$row) {
                return null;
            }
            return new Editeur($row['id_ed'], $row['nom_ed']);
        } catch (\PDOException $e) {
            throw DaoException::fromFetchEditeurPDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromFetchEditeurException($e);
        }
    }

        // Lecture de touts les editeurs

    public function getAllEditeur(): array {
        $query = Requetes::SELECT_ALL_EDITEUR;
        try{
            $stmt = $this->conn->prepare($query);
            $editeurs = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $editeurs[] = new Editeur($row['id_ed'], $row['nom_ed']);
            }
            return $editeurs;
        } catch (\PDOException $e) {
            throw DaoException::fromFetchAllEditeursPDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromFetchAllEditeursException($e);
        }
    }

    // Mise à jour d'un editeur

    public function updateEditeur(Editeur $editeur): bool {
        $query = Requetes::UPDATE_EDITEUR;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':nom_ed', $editeur->getNom_ed());
            $stmt->bindValue(':id_ed', $editeur->getId_ed(), \PDO::PARAM_INT);
            return $stmt->execute();
        } catch (\PDOException $e) {
            throw DaoException::fromUpdateEditeurPDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromUpdateEditeurException($e);
        }
    }

    // Suppression d'un editeur

    public function deleteEditeur(int $id_ed): bool {
        $query = Requetes::DELETE_EDITEUR;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':id_ed', $id_ed, \PDO::PARAM_INT);
            return $stmt->execute();
        } catch (\PDOException $e) {
            throw DaoException::fromDeleteEditeurPDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromDeleteEditeurException($e);
        }
    }

    public function createRole(RoleUtilisateur $role)
    {
        $query = Requetes::INSERT_ROLE;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue('nom_role', $role->getNomRole(), PDO::PARAM_STR);
            $stmt->execute();

            return true;
        } catch (\PDOException $e){
            throw DaoException::fromCreateRoleUtilisateurPDOException($e);
        } catch (\Exception $e){
            throw DaoException::fromCreateRoleUtilisateurException($e);
        }
    }

    public function getRoleByID(int $roleId): ?RoleUtilisateur
    {
        $query = Requetes::READ_ROLE;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue('id_role', $roleId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\PDOException $e){
            throw DaoException::fromFetchRoleUtilisateurPDOException($e);
        } catch (\Exception $e){
            throw DaoException::fromFetchRoleUtilisateurException($e);
        }
    }

    public function getAllRole(int $roleId) {
        $query = Requetes::READ_ALL_ROLE; 
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw DaoException::fromFetchAllRoleUtilisateurPDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromFetchAllRoleUtilisateurException($e);
        }
    }

    public function updateRole(RoleUtilisateur $role)
    {
        $query = Requetes::UPDATE_ROLE;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue('nom_role', $role->getNomRole(), PDO::PARAM_STR);
            $stmt->bindValue('id_role', $role->getIdRole(), PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (\PDOException $e) {
            throw DaoException::fromUpdateRolePDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromUpdateRoleException($e);
        }
    }

    public function deleteRole(RoleUtilisateur $roleId)
    {
        $query = Requetes::DELETE_ROLE;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue('id_role', $roleId, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (\PDOException $e) {
            throw DaoException::fromDeleteRolePDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromDeleteRoleException($e);
        }
    }

    public function createNiveau(NiveauUtilisateur $niveau)
    {
        $query = Requetes::INSERT_NIVEAU;
        try{
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue('nom_niveau', $niveau->getNomNiveau(), PDO::PARAM_STR);
        $stmt->bindValue('description', $niveau->getDescription(), PDO::PARAM_STR);
        $stmt->execute();

        return true;
        } catch (\PDOException $e){
            throw DaoException::fromCreateNiveauPDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromCreateNiveauException($e);
        }
    }

    public function getNiveauById(int $niveauId): ?NiveauUtilisateur
    {
        $query = Requetes::READ_NIVEAU;
        try {
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue('id_niveau', $niveauId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw DaoException::fromReadNiveauPDOException($e);
        } catch (\Exception $e){
            throw DaoException::fromReadNiveauException($e);
        }
    }

    public function getAllNiveau(int $niveauId): ?NiveauUtilisateur
    {
        $query = Requetes::READ_ALL_NIVEAU;
        try {
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue('id_niveau', $niveauId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw DaoException::fromReadAllNiveauPDOException($e);
        } catch (\Exception $e){
            throw DaoException::fromReadAllNiveauException($e);
        }
    }

    public function updateNiveau(NiveauUtilisateur $niveau)
    {
        $query = Requetes::UPDATE_NIVEAU;
        try {
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':nom_niveau', $niveau->getNomNiveau());
        $stmt->bindValue(':description', $niveau->getDescription());
        $stmt->bindValue(':id_niveau', $niveau->getIdNiveau());
        $stmt->execute();
        } catch (\PDOException $e){
            throw DaoException::fromUpdateNiveauPDOException($e);
        } catch (\Exception $e){
            throw DaoException::fromUpdateNiveauException($e);
        }
    }

    public function deleteNiveau(int $niveauId)
    {
        $query = Requetes::DELETE_NIVEAU;
        try {
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue('id_niveau', $niveauId);
        $stmt->execute();
        return true;
        } catch (\PDOException $e){
            throw DaoException::fromDeleteNiveauPDOException($e);
        } catch (\Exception $e){
            throw DaoException::fromDeleteNiveauException($e);
        }
    }

    public function createUser(CreationUser $createUser, Utilisateur $utilisateur) {
        $query = Requetes::INSERT_USER;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue('nom_user', $utilisateur->getNomUser(), PDO::PARAM_STR);
            $stmt->bindValue('mot_de_passe', $createUser->getPassword(), PDO::PARAM_STR);
            $stmt->bindValue('avatar', $utilisateur->getAvatar(), PDO::PARAM_STR);
            $stmt->bindValue('mail', $utilisateur->getMail(), PDO::PARAM_STR);
            $stmt->bindValue('age', $utilisateur->getAge(), PDO::PARAM_INT);
            $stmt->bindValue('id_role', $utilisateur->getRole()->getIdRole(), PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (\PDOException $e){
            throw DaoException::fromCreateUtilisateurPDOException($e);
        } catch (\Exception $e){
            throw DaoException::fromCreateUtilisateurException($e);
        }
    }

    public function readUser(int $userId): ?Utilisateur {
        $query = Requetes::READ_USER;
        try {
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue('id_user', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\PDOException $e){
            throw DaoException::fromReadUtilisateurPDOException($e);
        } catch (\Exception $e){
            throw DaoException::fromReadUtilisateurException($e);
        }
        
    }

    public function readAllUser(int $userId): ?Utilisateur {
        $query = Requetes::READ_ALL_USER;
        try {
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue('id_user', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\PDOException $e){
            throw DaoException::fromReadAllUtilisateurPDOException($e);
        } catch (\Exception $e){
            throw DaoException::fromReadAllUtilisateurException($e);
        }
        
    }

    public function updateUser(CreationUser $creationUser, Utilisateur $utilisateur) {
        $query = Requetes::UPDATE_USER;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue('nom_user', $utilisateur->getNomUser(), PDO::PARAM_STR);
            $stmt->bindValue('mot_de_passe', $creationUser->getPassword(),PDO::PARAM_STR);
            $stmt->bindValue('avatar', $utilisateur->getAvatar(),PDO::PARAM_STR);
            $stmt->bindValue('mail', $utilisateur->getMail(),PDO::PARAM_STR);
            $stmt->bindValue('age', $utilisateur->getAge(),PDO::PARAM_INT);
            $stmt->bindValue('id_role', $utilisateur->getRole()->getIdRole(),PDO::PARAM_INT);
            $stmt->bindValue('id_user', $utilisateur->getIdUser(),PDO::PARAM_INT);
            $stmt->execute();
            return true;        
        }  catch (\PDOException $e){
            throw DaoException::fromUpdateUtilisateurPDOException($e);
        } catch (\Exception $e){
            throw DaoException::fromUpdateUtilisateurException($e);
        }

    }

    public function deleteUser(int $userId) {
        $query = Requetes::DELETE_USER;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':id_user', $userId);
            $stmt->execute();
            return true;
        }  catch (\PDOException $e){
            throw DaoException::fromDeleteUtilisateurPDOException($e);
        } catch (\Exception $e){
            throw DaoException::fromDeleteUtilisateurException($e);
        }
    }
    
    
    // Quiz //

    // Insérer un nouveau quiz
    public function createQuiz(Quiz $quiz, CreationUser $creationUser) {
        $query = Requetes::INSERT_QUIZ;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $quiz->getId_cat_quiz(), PDO::PARAM_INT);
            $stmt->bindValue(2, $creationUser->getIdUser(), PDO::PARAM_INT);
            $stmt->bindValue(3, $quiz->getTitre_quiz(), PDO::PARAM_STR);
            $stmt->bindValue(4, $quiz->getPhoto_quiz(), PDO::PARAM_STR);
            $stmt->execute();
            return true;
        }
        catch (\Exception $e) {
            throw DaoException::fromCreateQuiz($e);
        }
    }
    // Sélectionner un quiz par son identifiant
    public function selectQuizById(Quiz $quiz) {
        $query = Requetes::SELECT_QUIZ;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $quiz->getId_quiz(), PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            throw DaoException::fromSelectQuizById($e);
        }
    }
        // Sélectionner un/des quiz par sa/leur catégorie/s
    public function selectQuizByCat(Quiz $quiz) {
        $query = Requetes::SELECT_CAT_QUIZ;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $quiz->getId_cat_quiz(), PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            throw DaoException::fromSelectQuizByCat($e);
        }
    }

    // Mettre à jour un quiz
    public function updateQuiz(Quiz $quiz, CreationUser $creationUser) {
        $query = Requetes::UPDATE_QUIZ;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $quiz->getId_cat_quiz(), PDO::PARAM_INT);
            $stmt->bindValue(2, $creationUser->getIdUser(), PDO::PARAM_INT);
            $stmt->bindValue(3, $quiz->getTitre_quiz(), PDO::PARAM_STR);
            $stmt->bindValue(4, $quiz->getId_quiz(), PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (\Exception $e) {
            throw DaoException::fromUpdateQuiz($e);
        }
    }
    // Supprimer un quiz
    public function deleteQuiz(Quiz $quiz) {
        $query = Requetes::DELETE_QUIZ;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $quiz->getId_quiz(), PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (\Exception $e) {
            throw DaoException::fromDeleteQuiz($e);
        }
    }

    // Insérer une nouvelle question
    public function createQuestion(Question $question) {
        $query = Requetes::INSERT_QUESTION;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $question->getId_quiz(), PDO::PARAM_INT);
            $stmt->bindValue(2, $question->getQuestion_quiz(), PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (\Exception $e) {
            throw DaoException::fromCreateQuestion($e);
        }
    }
    // Sélectionner une question par son identifiant
    public function selectQuestionById(Question $question) {
        $query = Requetes::SELECT_QUESTION;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $question->getId_question(), PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            throw DaoException::fromSelectQuestionById($e);
        }
    }
    // Sélectionner toutes les questions d'un quiz spécifique
    public function selectAllQuestionsFromQuiz(Question $question) {
        $query = Requetes::SELECT_ALL_QUESTIONS_FROM_QUIZ;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $question->getId_quiz(), PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            throw DaoException::fromSelectAllQuestions($e);
        }
    }


    // Insérer une nouvelle réponse
    public function createReponse(Reponse $reponse) {
        $query = Requetes::INSERT_REPONSE;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $reponse->getId_question(), PDO::PARAM_INT);
            $stmt->bindValue(2, $reponse->getReponse_quiz(), PDO::PARAM_STR);
            $stmt->bindValue(3, $reponse->getReponse_vraie_quiz(), PDO::PARAM_BOOL);
            $stmt->execute();
            return true;
        } catch (\Exception $e) {
            throw DaoException::fromCreateReponse($e);
        }
    }
    // Sélectionner une réponse par son identifiant
    public function selectReponseById(Reponse $reponse) {
        $query = Requetes::SELECT_REPONSE;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $reponse->getId_reponse(), PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            throw DaoException::fromSelectReponseById($e);
        }
    }
    // Sélectionner toutes les réponses d'une question spécifique
    public function selectAllReponsesFromQuestion(Reponse $reponse) {
        $query = Requetes::SELECT_ALL_REPONSES_FROM_QUESTION;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $reponse->getId_question(), PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            throw DaoException::fromSelectAllReponse($e);
        }
    }
  

    // Les catégories sont prédéfinies et non vouées à changer, donc pas de création, d'update ou de delete
    // Sélectionner une catégorie par son identifiant 1 ou 2 :
    public function selectCategorieById(Categorie $categorie) {
        $query = Requetes::SELECT_CATEGORIE;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $categorie->getId_cat_quiz(), PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            throw DaoException::fromSelectCategorieById($e);
        }
    }
    // Sélectionner toutes les catégories (2)
    public function selectAllCategories() {
        $query = Requetes::SELECT_ALL_CATEGORIES;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            throw DaoException::fromSelectAllCategorie($e);
        }
    }

    // Pour les scores aux quiz, il n'est pas possible de supprimer un score. 
    // Impossible de le modifier également, en revanche, on peut en ajouter autant qu'on veut car un utilisateur peut rejouer le quiz à volonté
    // Donc ni update ni delete
    // Insérer un nouveau record de jeu :
    public function insertJouerQuiz(JouerQuiz $jouerquiz, CreationUser $creationUser) {
        $query = Requetes::INSERT_JOUERQUIZ;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $jouerquiz->getId_quiz(), PDO::PARAM_INT);
            $stmt->bindValue(2, $creationUser->getIdUser(), PDO::PARAM_INT);
            $stmt->bindValue(3, $jouerquiz->getScore_quiz(), PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (\Exception $e) {
            throw DaoException::fromInsertJouerQuiz($e);
        }
    }
    // Sélectionner un record spécifique par id_quiz et id_user
    public function selectJouerQuiz(JouerQuiz $jouerquiz, CreationUser $creationUser) {
        $query = Requetes::SELECT_JOUERQUIZ;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $jouerquiz->getId_quiz(), PDO::PARAM_INT);
            $stmt->bindValue(2, $creationUser->getIdUser(), PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            throw DaoException::fromSelectJouerQuiz($e);
        }
    }
    

    




}