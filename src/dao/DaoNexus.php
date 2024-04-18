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
    
    public function __construct() {
        try {
            $this->conn = Database::getConnection();
        } catch (\Exception $e) {
            $conn = null;
        }
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

    public function addRechercheRapide(RechercheRapide $rechercheRapide) {
        $query = Requetes::INSERT_RECHERCHE_RAPIDE;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $rechercheRapide->getIdUser(), PDO::PARAM_INT);
            $stmt->bindValue(2, $rechercheRapide->getIdJeu(), PDO::PARAM_INT);
            
            return $stmt->execute();
        } catch (\PDOException $e) {
            throw DaoException::fromCreateRechercheRapidePDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromCreateRechercheRapideException($e);
        }
    }

    public function getRechercheRapideByJeu(RechercheRapide $rechercheRapide) {
        $query = Requetes::SELECT_RECHERCHE_RAPIDE;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $rechercheRapide->getIdJeu(), PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw DaoException::fromFetchRechercheRapidePDOException($e);
        } catch (\Exception $e) {
            throw DaoException::fromFetchRechercheRapideException($e);
        }
    }

    public function updateRechercheRapide(RechercheRapide $rechercheRapide) {
        $query = Requetes::UPDATE_RECHERCHE_RAPIDE;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $rechercheRapide->getIdJeu(), PDO::PARAM_INT);
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
    public function createAnnonce(Annonce $annonce) {
        $query = Requetes::CREATE_ANNONCE;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $annonce->getNomAnnonce(), PDO::PARAM_STR);
            $stmt->bindValue(2, $annonce->getNbUser(), PDO::PARAM_INT);
            $stmt->bindValue(3, $annonce->getDescAnnonce(), PDO::PARAM_STR);
            $stmt->bindValue(4, $annonce->getIdUser(), PDO::PARAM_INT);
            $stmt->bindValue(5, $annonce->getIdJeu(), PDO::PARAM_INT);
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
    public function updateAnnonce(Annonce $annonce) {
        $query = Requetes::UPDATE_ANNONCE;
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $annonce->getNomAnnonce(), PDO::PARAM_STR);
            $stmt->bindValue(2, $annonce->getNbUser(), PDO::PARAM_INT);
            $stmt->bindValue(3, $annonce->getDescAnnonce(), PDO::PARAM_STR);
            $stmt->bindValue(4, $annonce->getIdUser(), PDO::PARAM_INT);
            $stmt->bindValue(5, $annonce->getIdJeu(), PDO::PARAM_INT);
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

    public function create(Jeu $jeu, Studio $studio, Editeur $editeur): bool {
        $query = Requetes::INSERT_JEU;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':nom_jeu', $jeu->getNom_jeu());
        $stmt->bindValue(':resum_jeu', $jeu->getResum_jeu());
        $stmt->bindValue(':img_jeu', $jeu->getImg_jeu());
        $stmt->bindValue(':multi', $jeu->getMulti() ? 1 : 0, \PDO::PARAM_INT);
        $stmt->bindValue(':id_ed', $editeur->getId_ed(), \PDO::PARAM_INT);
        $stmt->bindValue(':id_user', $jeu->getIdUser(), \PDO::PARAM_INT);
        $stmt->bindValue(':id_stu', $studio->getId_stu(), \PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getById(int $id_jeu): ?Jeu {
        $query = Requetes::SELECT_jEU;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id_jeu', $id_jeu, \PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if (!$row) {
            return null;
        }
        return new Jeu($row['id_jeu'], $row['nom_jeu'], $row['resum_jeu'], $row['img_jeu'], (bool) $row['multi'], $row['id_ed'], $row['id_user'], $row['id_stu']);
    }

    public function getAll(): array {
        $query = Requetes::SELECT_ALL_JEU;
        $stmt = $this->conn->prepare($query);
        $jeux = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $jeux[] = new Jeu($row['id_jeu'], $row['nom_jeu'], $row['resum_jeu'], $row['img_jeu'], (bool) $row['multi'], $row['id_ed'], $row['id_user'], $row['id_stu']);
        }
        return $jeux;
    }

    public function update(Jeu $jeu, Studio $studio, Editeur $editeur): bool {
        $query = Requetes::UPDATE_JEU;
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
    }

    public function delete(int $id_jeu): bool {
        $query = Requetes::DELETE_JEU;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id_jeu', $id_jeu, \PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function createStudio(Studio $studio): bool {
        $query = Requetes::INSERT_STUDIO;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':nom_stu', $studio->getNom_stu());
        $stmt->bindValue(':id_ed', $studio->getId_ed(), \PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getByIdStudio(int $id_stu): ?Studio {
        $query = Requetes::SELECT_STUDIO;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id_stu', $id_stu, \PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if (!$row) {
            return null;
        }
        return new Studio($row['id_stu'], $row['nom_stu'], $row['id_ed']);
    }

    public function getAllStudio(): array {
        $query = Requetes::SELECT_ALL_STUDIO;
        $stmt = $this->conn->prepare($query);
        $studios = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $studios[] = new Studio($row['id_stu'], $row['nom_stu'], $row['id_ed']);
        }
        return $studios;
    }

    public function updateStudio(Studio $studio): bool {
        $query = Requetes::UPDATE_STUDIO;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':nom_stu', $studio->getNom_stu());
        $stmt->bindValue(':id_ed', $studio->getId_ed(), \PDO::PARAM_INT);
        $stmt->bindValue(':id_stu', $studio->getId_stu(), \PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteStudio(int $id_stu): bool {
        $query = Requetes::DELETE_STUDIO;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id_stu', $id_stu, \PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function createEditeur(Editeur $editeur): bool {
        $query = Requetes::INSERT_EDITEUR;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':nom_ed', $editeur->getNom_ed());
        return $stmt->execute();
    }

    public function getByIdEditeur(int $id_ed): ?Editeur {
        $query = Requetes::SELECT_EDITEUR;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id_ed', $id_ed, \PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if (!$row) {
            return null;
        }
        return new Editeur($row['id_ed'], $row['nom_ed']);
    }

    public function getAllEditeur(): array {
        $query = Requetes::SELECT_ALL_EDITEUR;
        $stmt = $this->conn->prepare($query);
        $editeurs = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $editeurs[] = new Editeur($row['id_ed'], $row['nom_ed']);
        }
        return $editeurs;
    }

    public function updateEditeur(Editeur $editeur): bool {
        $query = Requetes::UPDATE_EDITEUR;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':nom_ed', $editeur->getNom_ed());
        $stmt->bindValue(':id_ed', $editeur->getId_ed(), \PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteEditeur(int $id_ed): bool {
        $query = Requetes::DELETE_EDITEUR;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id_ed', $id_ed, \PDO::PARAM_INT);
        return $stmt->execute();
    }
}