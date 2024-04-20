<?php
declare(strict_types=1);

namespace Nexus_gathering\dao;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use PDO;
use Nexus_gathering\dao\Database;
use Nexus_gathering\dao\DaoException;
use Nexus_gathering\metier\Jeu;
use Nexus_gathering\dao\Requetes;
use Nexus_gathering\metier\Messages;
use Nexus_gathering\metier\Annonce;
use Nexus_gathering\metier\RechercheRapide;
use Nexus_gathering\metier\Editeur;
use Nexus_gathering\metier\Formats;
use Nexus_gathering\metier\Genre;
use Nexus_gathering\metier\Plateforme;
use Nexus_gathering\metier\Studio;
use Nexus_gathering\metier\CreationUser;    

//TODO : gestion des exceptions
class DaoNexus {
    
    private \PDO $conn;
    
    public function __construct(\PDO $conn = null) {
        $this->conn = $conn ?: Database::getConnection();
    }
    
    //      ---MESSAGERIE---
 
    public function createMessage(Messages $message) {
        $query = Requetes::INSERT_MESSAGE;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $message->getContenuMess(), PDO::PARAM_STR);
            $stmt->bindValue(2, $message->getIdExped(), PDO::PARAM_INT);
            $stmt->bindValue(3, $message->getIdDesti(), PDO::PARAM_INT);
            $stmt->execute();
    
            return true;
        } catch (\PDOException $e) {
            throw DaoException::fromCreateMessagePDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromCreateMessageException($e);
        }
    }
    
    public function getConversationMessages(Messages $message) {
        $query = Requetes::SELECT_CONV;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $message->getIdExped(), \PDO::PARAM_INT);
            $stmt->bindValue(2, $message->getIdDesti(), \PDO::PARAM_INT);
            $stmt->bindValue(3, $message->getIdDesti(), \PDO::PARAM_INT);
            $stmt->bindValue(4, $message->getIdExped(), \PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw DaoException::fromFetchConversationsPDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromFetchConversationsException($e);
        }
    }

    public function getUserConversations(CreationUser $creationUser) {
        $query = Requetes::SELECT_CONTACT;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':userId', $creationUser->getIdUser(), \PDO::PARAM_INT);  // Binder le même paramètre trois fois
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw DaoException::fromFetchUserConversationsException($e);
        } catch (\Exception $e) {
            throw DaoException::fromFetchUserConversationsException($e);
        }
    }
    
    public function updateMessage(Messages $message) {
        $query = Requetes::UPDATE_MESSAGE;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $message->getContenuMess(), \PDO::PARAM_STR);
            $stmt->bindValue(2, $message->getIdMessage(), \PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->rowCount() > 0;
        } catch (\PDOException $e) {
            throw DaoException::fromUpdateMessagePDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromUpdateMessageException($e);
        }
    }

    public function deleteMessage(Messages $message) {
        $query = Requetes::DELETE_MESSAGE;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $message->getIdMessage(), \PDO::PARAM_INT);
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

    public function create(Jeu $jeu, Studio $studio, Editeur $editeur): bool {
        $query = Requetes::INSERT_JEU;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':nom_jeu', $jeu->getNom_jeu());
            $stmt->bindValue(':resum_jeu', $jeu->getResum_jeu());
            $stmt->bindValue(':img_jeu', $jeu->getImg_jeu());
            $stmt->bindValue(':multi', $jeu->getMulti() ? 1 : 0, \PDO::PARAM_INT);
            $stmt->bindValue(':id_ed', $editeur->getId_ed(), \PDO::PARAM_INT);
            $stmt->bindValue(':id_user', $jeu->getIdUser(), \PDO::PARAM_INT);
            $stmt->bindValue(':id_stu', $studio->getId_stu(), \PDO::PARAM_INT);

            return $stmt->execute();
        } catch (\PDOException $e) {
            throw DaoException::fromCreateJeuPDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromCreateJeuException($e);
        }
    }

    // Lecture d'un jeu par ID

    public function getById(int $id_jeu): ?Jeu {
        $query = Requetes::SELECT_jEU;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':id_jeu', $id_jeu, \PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);
            if (!$row) {
                return null;
            }
            return new Jeu($row['id_jeu'], $row['nom_jeu'], $row['resum_jeu'], $row['img_jeu'], (bool) $row['multi'], $row['id_ed'], $row['id_user'], $row['id_stu']);
        } catch (\PDOException $e) {
            throw DaoException::fromFetchJeuPDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromFetchJeuException($e);
        }
    }

        // Lecture de touts les jeux

        public function getAll(): array {
            $query = Requetes::SELECT_ALL_JEU;
            try {
                $stmt = $this->conn->prepare($query);
                $stmt->execute(); // Exécuter la requête
                $jeux = [];
                while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                    // Traitement des valeurs NULL pour les arguments de la construction de Jeu
                    $resume = isset($row['resum_jeu']) ? $row['resum_jeu'] : ''; // Valeur par défaut si le champ est NULL
                    $img = isset($row['img_jeu']) ? $row['img_jeu'] : ''; // Valeur par défaut si le champ est NULL
                    $id_ed = isset($row['id_ed']) ? (int)$row['id_ed'] : 0; // Valeur par défaut si le champ est NULL
                    $id_user = isset($row['id_user']) ? (int)$row['id_user'] : 0; // Valeur par défaut si le champ est NULL
                    $id_stu = isset($row['id_stu']) ? (int)$row['id_stu'] : 0; // Valeur par défaut si le champ est NULL
                    // Création de l'objet Jeu en prenant en compte les valeurs par défaut
                    $jeux[] = new Jeu($row['id_jeu'], $row['nom_jeu'], $resume, $img, (bool) $row['multi'], $id_ed, $id_user, $id_stu);
                }
                return $jeux;
            } catch (\PDOException $e) {
                throw DaoException::fromFetchAllJeuxPDOException($e);
            } catch (\Exception $e) {
                throw DaoException::fromFetchAllJeuxException($e);
            }
        }
        
        
        
        

    // Mise à jour d'un jeu

    public function update(Jeu $jeu, Studio $studio, Editeur $editeur): bool {
        $query = Requetes::UPDATE_JEU;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':nom_jeu', $jeu->getNom_jeu());
            $stmt->bindValue(':resum_jeu', $jeu->getResum_jeu());
            $stmt->bindValue(':img_jeu', $jeu->getImg_jeu());
            $stmt->bindValue(':multi', $jeu->getMulti() ? 1 : 0, \PDO::PARAM_INT);
            $stmt->bindValue(':id_ed', $editeur->getId_ed(), \PDO::PARAM_INT);
            $stmt->bindValue(':id_user', $jeu->getIdUser(), \PDO::PARAM_INT);
            $stmt->bindValue(':id_stu', $studio->getId_stu(), \PDO::PARAM_INT);
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
        $query = Requetes::DELETE_JEU;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':id_jeu', $id_jeu, \PDO::PARAM_INT);
            return $stmt->execute();
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
        try{
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
}