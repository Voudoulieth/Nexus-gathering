<?php

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use Nexus_gathering\dao\DaoNexus;
use Nexus_gathering\dao\DataBase;

// UTILISER DIR NAME

// Créer une instance de la classe DAO
$dao = new DaoNexus();

// <?php

// declare(strict_types=1);
// namespace Nexus_gathering\src\test;

// use Nexus_gathering\src\dao\DaoNexus;
// use Nexus_gathering\src\dao\Database;


// // Créer une instance de la classe DAO
// $dao = new Nexus_gathering();

// Définir les données de test
$contenu = "Ceci est un message test.";
$idExped = 2;
$idDesti = 3;

// Appeler la fonction createMessage
$result = $dao->createMessage($contenu, $idExped, $idDesti);

// Afficher le résultat
if ($result) {
    echo "Le message a été créé avec succès.";
} else {
    echo "Erreur lors de la création du message.";
}

// Test getAllMessagesForUser
$allMessages = $dao->getAllMessagesForUser($id_user);
echo "Messages pour l'utilisateur $id_user:\n";
print_r($allMessages);

// Test getConversationMessages
$conversationMessages = $dao->getConversationMessages($idExped, $idDesti);
echo "Conversation entre $idExped et $idDesti:\n";
print_r($conversationMessages);

// Test updateMessage
$nouveauContenu = "Ceci est le contenu modifié.";
$updateStatus = $dao->updateMessage($messageId, $nouveauContenu);
echo $updateStatus ? "Le message $messageId a été mis à jour.\n" : "Échec de la mise à jour du message $messageId.\n";

// Test deleteMessage
$deleteStatus = $dao->deleteMessage($messageId);
echo $deleteStatus ? "Le message 6 a été supprimé.\n" : "Échec de la suppression du message $messageId.\n";