<?php
declare(strict_types=1);

namespace Nexus_gathering\dao;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use PDO;
use Nexus_gathering\dao\Database;
use Nexus_gathering\dao\Requetes;
use Nexus_gathering\metier\Messages;
use Nexus_gathering\metier\Annonce;
use Nexus_gathering\metier\Editeur;
use Nexus_gathering\metier\Formats;
use Nexus_gathering\metier\Genre;
use Nexus_gathering\metier\Jeu;
use Nexus_gathering\metier\Plateforme;
use Nexus_gathering\metier\Studio;


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

    public function createMessage($contenu, $idExped, $idDesti) {
        $query = Requetes::INSERT_MESSAGE;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(1, $contenu, PDO::PARAM_STR);
            $stmt->bindValue(2, $idExped, PDO::PARAM_INT);
            $stmt->bindValue(3, $idDesti, PDO::PARAM_INT);
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
    

    public function getAllMessagesForUser($userId) {
        $query = Requetes::SELECT_MESSAGE;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $userId, \PDO::PARAM_INT);
        $stmt->bindValue(2, $userId, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    

    public function getConversationMessages($idExped, $idDesti) {
        $query = Requetes::SELECT_CONV;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $idExped, \PDO::PARAM_INT);
        $stmt->bindValue(2, $idDesti, \PDO::PARAM_INT);
        $stmt->bindValue(3, $idDesti, \PDO::PARAM_INT);
        $stmt->bindValue(4, $idExped, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getUserConversations($userId) {
        $query = Requetes::SELECT_CONTACT;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':userId', $userId, \PDO::PARAM_INT);  // Binder le même paramètre trois fois
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    

    
    public function updateMessage($messageId, $nouveauContenu) {
        $query = Requetes::UPDATE_MESSAGE;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $nouveauContenu, \PDO::PARAM_STR);
        $stmt->bindValue(2, $messageId, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
    

    
    public function deleteMessage($messageId) {
        $query = Requetes::DELETE_MESSAGE;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $messageId, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
    

    //          ---RECHERCHE RAPIDE---

    public function addRechercheRapide($userId, $jeuId) {
        $query = Requetes::INSERT_RECHERCHE_RAPIDE;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $userId, PDO::PARAM_INT);
        $stmt->bindValue(2, $jeuId, PDO::PARAM_INT);
        return $stmt->execute();
    }
    

    public function getRechercheRapideByJeu($jeuId) {
        $query = Requetes::SELECT_RECHERCHE_RAPIDE;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $jeuId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function updateRechercheRapide($sessionId, $newJeuId) {
        $query = Requetes::UPDATE_RECHERCHE_RAPIDE;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $newJeuId, PDO::PARAM_INT);
        $stmt->bindValue(2, $sessionId, PDO::PARAM_INT);
        return $stmt->execute();
    }
    

    public function endRechercheRapide($sessionId) {
        $query = Requetes::END_RECHERCHE_RAPIDE;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $sessionId, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    public function deleteRechercheRapide($sessionId) {
        $query = Requetes::DELETE_RECHERCHE_RAPIDE;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $sessionId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    //          ---ANNONCE---

    // Création d'une annonce
    public function createAnnonce(Annonce $annonce) {
        $query = Requetes::CREATE_ANNONCE;
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            $annonce->getNomAnnonce(),
            $annonce->getNbUser(),
            $annonce->getDescAnnonce(),
            $annonce->getIdUser(),
            $annonce->getIdJeu()
        ]);
        return $stmt->rowCount() > 0;
    }

    // Lecture d'une annonce par ID
    public function readAnnonce(int $id_annonce) {
        $query = Requetes::READ_ANNONCE;
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id_annonce]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function readAllAnnonces() {
        $query = "SELECT * FROM Annonce"; // Assurez-vous que le nom de la table est correct
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Récupère toutes les annonces
    }
    

    // Mise à jour d'une annonce
    public function updateAnnonce(Annonce $annonce) {
        $query = Requetes::UPDATE_ANNONCE;
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            $annonce->getNomAnnonce(),
            $annonce->getNbUser(),
            $annonce->getDescAnnonce(),
            $annonce->getIdUser(),
            $annonce->getIdJeu(),
            $annonce->getIdAnnonce()
        ]);
        return $stmt->rowCount() > 0;
    }

    // Suppression d'une annonce
    public function deleteAnnonce(int $id_annonce) {
        $query = Requetes::DELETE_ANNONCE;
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $id_annonce, PDO::PARAM_INT);
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