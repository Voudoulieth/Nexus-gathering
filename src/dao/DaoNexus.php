<?php
declare(strict_types=1);

namespace Nexus_gathering\dao;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use PDO;
use Nexus_gathering\dao\Database;
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
            
            if ($stmt->errorCode() == '00000') {
                return true;
            } else {
                throw new \Exception("Erreur lors de l'insertion du message : " . implode(", ", $stmt->errorInfo()));
            }
        } catch (\PDOException $e) {
            throw new \Exception("PDOException lors de l'insertion du message : " . $e->getMessage());
        } catch (\Exception $e) {
            throw new \Exception("Exception générale lors de l'insertion du message : " . $e->getMessage());
        }
    }
    
    

    public function getAllMessagesForUser(CreationUser $CreationUser) {
        $query = Requetes::SELECT_MESSAGE;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $CreationUser->getIdUser(), \PDO::PARAM_INT);
        $stmt->bindValue(2, $CreationUser->getIdUser(), \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    

    public function getConversationMessages(Messages $message) {
        $query = Requetes::SELECT_CONV;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $message->getIdExped(), \PDO::PARAM_INT);
        $stmt->bindValue(2, $message->getIdDesti(), \PDO::PARAM_INT);
        $stmt->bindValue(3, $message->getIdDesti(), \PDO::PARAM_INT);
        $stmt->bindValue(4, $message->getIdExped(), \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getUserConversations(CreationUser $CreationUser) {
        $query = Requetes::SELECT_CONTACT;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':userId', $CreationUser->getIdUser(), \PDO::PARAM_INT);  // Binder le même paramètre trois fois
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    

    
    public function updateMessage(Messages $message) {
        $query = Requetes::UPDATE_MESSAGE;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $message->getContenuMess(), \PDO::PARAM_STR);
        $stmt->bindValue(2, $message->getIdMessage(), \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
    

    
    public function deleteMessage(Messages $message) {
        $query = Requetes::DELETE_MESSAGE;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $message->getIdMessage(), \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
    

    //          ---RECHERCHE RAPIDE---

    public function addRechercheRapide(RechercheRapide $RechercheRapide) {
        $query = Requetes::INSERT_RECHERCHE_RAPIDE;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $RechercheRapide->getIdUser(), PDO::PARAM_INT);
        $stmt->bindValue(2, $RechercheRapide->getId_jeu(), PDO::PARAM_INT);
        return $stmt->execute();
    }
    

    public function getRechercheRapideByJeu(RechercheRapide $RechercheRapide) {
        $query = Requetes::SELECT_RECHERCHE_RAPIDE;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $RechercheRapide->getId_jeu(), PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function updateRechercheRapide(RechercheRapide $RechercheRapide) {
        $query = Requetes::UPDATE_RECHERCHE_RAPIDE;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $RechercheRapide->getId_jeu(), PDO::PARAM_INT);
        $stmt->bindValue(2, $RechercheRapide->getIdSession(), PDO::PARAM_INT);
        return $stmt->execute();
    }
    

    public function endRechercheRapide(RechercheRapide $RechercheRapide) {
        $query = Requetes::END_RECHERCHE_RAPIDE;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $RechercheRapide->getIdSession(), PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    public function deleteRechercheRapide(RechercheRapide $RechercheRapide) {
        $query = Requetes::DELETE_RECHERCHE_RAPIDE;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $RechercheRapide->getIdSession(), PDO::PARAM_INT);
        return $stmt->execute();
    }

    //          ---ANNONCE---

    // Création d'une annonce
    public function createAnnonce(Annonce $Annonce) {
        $query = Requetes::CREATE_ANNONCE;
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            $Annonce->getNomAnnonce(),
            $Annonce->getNbUser(),
            $Annonce->getDescAnnonce(),
            $Annonce->getIdUser(),
            $Annonce->getIdJeu()
        ]);
        return $stmt->rowCount() > 0;
    }

    // Lecture d'une annonce par ID
    public function readAnnonce(Annonce $Annonce) {
        $query = Requetes::READ_ANNONCE;
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$Annonce->getIdAnnonce()]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function readAllAnnonces() {
        $query = Requetes::READ_ALL_ANNONCE; 
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    // Mise à jour d'une annonce
    public function updateAnnonce(Annonce $Annonce) {
        $query = Requetes::UPDATE_ANNONCE;
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            $Annonce->getNomAnnonce(),
            $Annonce->getNbUser(),
            $Annonce->getDescAnnonce(),
            $Annonce->getIdUser(),
            $Annonce->getIdJeu(),
            $Annonce->getIdAnnonce()
        ]);
        return $stmt->rowCount() > 0;
    }

    // Suppression d'une annonce
    public function deleteAnnonce(Annonce $Annonce) {
        $query = Requetes::DELETE_ANNONCE;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $Annonce->getIdAnnonce(), PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;
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