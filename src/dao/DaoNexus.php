<?php
declare(strict_types=1);
namespace Nexus_gathering\src\dao;


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

public function createMessage($contenu, $idExped, $idDesti, $dateMessageId) {
        $sql = "INSERT INTO Messages (contenu_mess, modif, id_exped, id_desti, date_message_id) VALUES (?, false, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("siii", $contenu, $idExped, $idDesti, $dateMessageId);
        $stmt->execute();
        return $stmt->error ? false : true;
    }

    public function getAllMessagesForUser($userId) {
        $sql = "SELECT * FROM Messages WHERE id_exped = ? OR id_desti = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $userId, $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getConversationMessages($idExped, $idDesti) {
        $sql = "SELECT * FROM Messages WHERE (id_exped = ? AND id_desti = ?) OR (id_exped = ? AND id_desti = ?) ORDER BY date_message ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iiii", $idExped, $idDesti, $idDesti, $idExped);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    

    
    public function updateMessage($messageId, $nouveauContenu) {
        $sql = "UPDATE Messages SET contenu_mess = ?, modif = true WHERE id_message = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $nouveauContenu, $messageId);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    
    public function deleteMessage($messageId) {
        $sql = "DELETE FROM Messages WHERE id_message = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $messageId);
        $stmt->execute();
        return $stmt->affected_rows > 0;
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