<?php
declare(strict_types=1);

namespace Nexus_gathering\dao;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use PDO;
use Nexus_gathering\dao\Database;
use Nexus_gathering\dao\DaoException;
use Nexus_gathering\dao\Jeu;
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
    
    // public function __construct() {
    //     try {
    //         $this->conn = Database::getConnection();
    //     } catch (\Exception $e) {
    //         $conn = null;
    //     }
    // }


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


    public function getJeux(): ?array {
        $jeux = array();
        $query = Requetes::SELECT_JEU;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $jeuxData = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($jeuxData as $row) {
                $jeu = new Jeu($row['id_jeu'], $row['nom_jeu'], $row['resum_jeu'], $row['img_jeu'], (bool)$row['multi'], $row['id_stu'], $row['id_ed'], $row['id_form'], $row['id_genre'], $row['id_plat']);
                array_push($jeux, $jeu);
            }
            return $jeux;
            } catch (\PDOException $e) {
                error_log('PDOException in getJeux(): ' . $e->getMessage());
                throw new \Exception('Erreur lors de la récupération des jeux.', $this->convertCode($e->getCode()));
            } catch (\Exception $e) {
                error_log('Exception in getJeux(): ' . $e->getMessage());
                throw new \Exception('Une erreur est survenue lors de la récupération des jeux.');
            }
        }
}