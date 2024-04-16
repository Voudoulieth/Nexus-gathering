<?php
declare(strict_types=1);

namespace Nexus_gathering\src\dao;

require_once __DIR__ . '/../../../vendor/autoload.php';

use PDO;
use Nexus_gathering\src\dao\Database;
use Nexus_gathering\src\dao\Requetes;
use Nexus_gathering\src\metier\Messages;
use Nexus_gathering\src\metier\Editeur;
use Nexus_gathering\src\metier\Formats;
use Nexus_gathering\src\metier\Genre;
use Nexus_gathering\src\metier\Jeu;
use Nexus_gathering\src\metier\Plateforme;
use Nexus_gathering\src\metier\Studio;


//TODO : gestion des exceptions
class Nexus_gathering {
    
    private \PDO $conn;
    
    public function __construct() {
        try {
            $this->conn = Database::getConnection();
        } catch (\Exception $e) {
            $conn = null;
        }
    }
    
    //      ---MESSAGERIE---

    // public function createMessage($contenu, $idExped, $idDesti) {
    //     $sql = "INSERT INTO Messages (contenu_mess, modif, id_exped, id_desti, date_message) VALUES (?, false, ?, ?, CURRENT_TIMESTAMP)";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->bindValue(1, $contenu, \PDO::PARAM_STR);
    //     $stmt->bindValue(2, $idExped, \PDO::PARAM_INT);
    //     $stmt->bindValue(3, $idDesti, \PDO::PARAM_INT);
    //     $stmt->execute();
    //     return $stmt->errorCode() == '00000';  // Retourne true si l'insertion a réussi
    // }
    

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
        $sql = "SELECT * FROM Messages WHERE id_exped = ? OR id_desti = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $userId, \PDO::PARAM_INT);
        $stmt->bindValue(2, $userId, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    

    public function getConversationMessages($idExped, $idDesti) {
        $sql = "SELECT * FROM Messages WHERE (id_exped = ? AND id_desti = ?) OR (id_exped = ? AND id_desti = ?) ORDER BY date_message ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $idExped, \PDO::PARAM_INT);
        $stmt->bindValue(2, $idDesti, \PDO::PARAM_INT);
        $stmt->bindValue(3, $idDesti, \PDO::PARAM_INT);
        $stmt->bindValue(4, $idExped, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    

    
    public function updateMessage($messageId, $nouveauContenu) {
        $sql = "UPDATE Messages SET contenu_mess = ?, modif = true WHERE id_message = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $nouveauContenu, \PDO::PARAM_STR);
        $stmt->bindValue(2, $messageId, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
    

    
    public function deleteMessage($messageId) {
        $sql = "DELETE FROM Messages WHERE id_message = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $messageId, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
    

    //          ---RECHERCHE RAPIDE---

    public function addRechercheRapide($userId, $jeuId) {
        $sql = "INSERT INTO rechercheRapide (id_user, id_jeu, deb_session) VALUES (?, ?, NOW())";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $userId, PDO::PARAM_INT);
        $stmt->bindValue(2, $jeuId, PDO::PARAM_INT);
        return $stmt->execute();
    }
    

    public function getRechercheRapideByJeu($jeuId) {
        $sql = "SELECT rr.id_session, u.nom, u.prenom, rr.deb_session, rr.fin_session
                FROM rechercheRapide rr
                JOIN utilisateur u ON rr.id_user = u.id_user
                WHERE rr.id_jeu = ? AND (rr.fin_session IS NULL OR rr.fin_session >= NOW())
                AND (rr.fin_session IS NULL OR TIMESTAMPDIFF(HOUR, rr.deb_session, rr.fin_session) <= 6)
                ORDER BY rr.id_session DESC";
    
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $jeuId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function updateRechercheRapide($sessionId, $newJeuId) {
        $sql = "UPDATE rechercheRapide SET id_jeu = ?, fin_session = CASE
                WHEN TIMESTAMPDIFF(HOUR, deb_session, NOW()) <= 6 THEN fin_session
                ELSE NOW()
                END
                WHERE id_session = ? AND (fin_session IS NULL OR fin_session >= NOW())";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $newJeuId, PDO::PARAM_INT);
        $stmt->bindValue(2, $sessionId, PDO::PARAM_INT);
        return $stmt->execute();
    }
    

    public function endRechercheRapide($sessionId) {
        $sql = "UPDATE rechercheRapide SET fin_session = NOW() WHERE id_session = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $sessionId, PDO::PARAM_INT);
        return $stmt->execute();
    }
    


        //      ---JEU---


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