<?php

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use Nexus_gathering\dao\DaoNexus;
use Nexus_gathering\metier\Messages;



$dao = new DaoNexus();

// Définir les données de test
$contenu = "Ceci est un message test.";
$idExped = 2;
$idDesti = 3;
$id_user = 4;
$messageId = 6;

$message = new Messages($messageId, $contenu, $modif, $idExped, $idDesti, $dateMessage);

// Appeler la fonction createMessage
$result = $dao->createMessage($message);

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


// Appeler la fonction getUserConversations
$conversations = $dao->getUserConversations($id_user);

// Afficher les résultats
echo "Conversations pour l'utilisateur $id_user:\n";
foreach ($conversations as $conversation) {
    echo "ID Utilisateur: " . $conversation['id_user'] . ", Nom: " . $conversation['nom_user'] . ", Dernier Message: " . $conversation['last_message_date'] . "\n <br><br>";
}

// Test updateMessage
$nouveauContenu = "Ceci est le contenu modifié.";
$updateStatus = $dao->updateMessage($messageId, $nouveauContenu);
echo $updateStatus ? "Le message $messageId a été mis à jour.\n" : "Échec de la mise à jour du message $messageId.\n";

// Test deleteMessage
$deleteStatus = $dao->deleteMessage($messageId);
echo $deleteStatus ? "Le message 6 a été supprimé.\n" : "Échec de la suppression du message $messageId.\n";

