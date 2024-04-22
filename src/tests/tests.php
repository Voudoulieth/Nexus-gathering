<?php

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use Nexus_gathering\dao\DaoNexus;
use Nexus_gathering\dao\DaoException;
use Nexus_gathering\metier\Messages;
use Nexus_gathering\metier\Jeu;

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


// Définir les données de test pour un jeu
$id_jeu = 1;
$nom_jeu = "Nom du jeu d'essai";
$resum_jeu = "Résumé du jeu d'essai";
$img_jeu = "lien_image_jeu.jpg";
$multi = true; // ou false selon le cas
$id_ed = 2; // ID de l'éditeur
$id_user = 3; // ID de l'utilisateur
$id_stu = 4; // ID du studio

// Création de l'objet Jeu
$jeu = new Jeu($id_jeu, $nom_jeu, $resum_jeu, $img_jeu, $multi, $id_ed, $id_user, $id_stu);

// Test de la création du jeu
try {
    $result = $dao->create($jeu, $studio, $editeur);
    echo $result ? "Le jeu a été créé avec succès." : "Erreur lors de la création du jeu.";
} catch (DaoException $e) {
    echo "Une erreur s'est produite lors de la création du jeu : " . $e->getMessage();
}

// Test de la récupération du jeu par ID
try {
    $id_jeu = 5 ;
    $jeu_recupere = $dao->getById($id_jeu);
    if ($jeu_recupere) {
        echo "Le jeu récupéré : " . $jeu_recupere->getNom_jeu();
    } else {
        echo "Aucun jeu trouvé avec cet ID.";
    }
} catch (DaoException $e) {
    echo "Une erreur s'est produite lors de la récupération du jeu : " . $e->getMessage();
}

// Test de la récupération de tous les jeux
try {
    $liste_jeux = $dao->getAll();
    if (!empty($liste_jeux)) {
        echo "Liste des jeux :";
        foreach ($liste_jeux as $jeu) {
            echo "- " . $jeu->getNom_jeu() . "<br>";
        }
    } else {
        echo "Aucun jeu trouvé.";
    }
} catch (DaoException $e) {
    echo "Une erreur s'est produite lors de la récupération de la liste des jeux : " . $e->getMessage();
}

// Test de la mise à jour du jeu
try {
    // Modifie les attributs du jeu d'essai si nécessaire
    $jeu->setNom_jeu("Nouveau nom du jeu");
    $jeu->setResum_jeu("Nouveau résumé du jeu");
    $jeu->setImg_jeu("nouveau_lien_image_jeu.jpg");
    $jeu->setMulti(false); // ou true si le jeu devient multijoueur
    $dao->update($jeu, $studio, $editeur);
    echo "Le jeu a été mis à jour avec succès !";
} catch (DaoException $e) {
    echo "Une erreur s'est produite lors de la mise à jour du jeu : " . $e->getMessage();
}

// Test de la suppression du jeu
try {
    $id_jeu_a_supprimer = 5;
    $dao->delete($id_jeu_a_supprimer);
    echo "Le jeu a été supprimé avec succès !";
} catch (DaoException $e) {
    echo "Une erreur s'est produite lors de la suppression du jeu : " . $e->getMessage();
}


// // Définir les données de test pour un jeu
// $nom_jeu = "Nom du jeu d'essai";
// $resum_jeu = "Résumé du jeu d'essai";
// $img_jeu = "lien_image_jeu.jpg";
// $multi = true; // ou false selon le cas
// $id_ed = 2; // ID de l'éditeur
// $id_user = 3; // ID de l'utilisateur
// $id_stu = 4; // ID du studio

// // Création de l'objet Jeu
// $jeu = new Jeu($nom_jeu, $resum_jeu, $img_jeu, $multi, $id_ed, $id_user, $id_stu);

// // Test de la création du jeu
// try {
//     $result = $dao->create($jeu, $studio, $editeur);
//     echo $result ? "Le jeu a été créé avec succès." : "Erreur lors de la création du jeu.";
// } catch (DaoException $e) {
//     echo "Une erreur s'est produite lors de la création du jeu : " . $e->getMessage();
// }

// // Test de la récupération du jeu par ID
// try {
//     $id_jeu = 1;
//     $jeu_recupere = $dao->getById($id_jeu);
//     if ($jeu_recupere) {
//         echo "Le jeu récupéré : " . $jeu_recupere->getNom_jeu();
//     } else {
//         echo "Aucun jeu trouvé avec cet ID.";
//     }
// } catch (DaoException $e) {
//     echo "Une erreur s'est produite lors de la récupération du jeu : " . $e->getMessage();
// }

// // Test de la récupération de tous les jeux
// try {
//     $liste_jeux = $dao->getAll();
//     if (!empty($liste_jeux)) {
//         echo "Liste des jeux :";
//         foreach ($liste_jeux as $jeu) {
//             echo "- " . $jeu->getNom_jeu() . "<br>";
//         }
//     } else {
//         echo "Aucun jeu trouvé.";
//     }
// } catch (DaoException $e) {
//     echo "Une erreur s'est produite lors de la récupération de la liste des jeux : " . $e->getMessage();
// }

// // Test de la mise à jour du jeu
// try {
//     // Modifie les attributs du jeu d'essai si nécessaire
//     $jeu->setNom_jeu("Nouveau nom du jeu");
//     $jeu->setResum_jeu("Nouveau résumé du jeu");
//     $jeu->setImg_jeu("nouveau_lien_image_jeu.jpg");
//     $jeu->setMulti(false); // ou true si le jeu devient multijoueur
//     $dao->update($jeu, $studio, $editeur);
//     echo "Le jeu a été mis à jour avec succès !";
// } catch (DaoException $e) {
//     echo "Une erreur s'est produite lors de la mise à jour du jeu : " . $e->getMessage();
// }

// // Test de la suppression du jeu
// try {
//     $id_jeu_a_supprimer = null;
//     $dao->delete($id_jeu, a_supprimer);
//     echo "Le jeu a été supprimé avec succès !";
// } catch (DaoException $e) {
//     echo "Une erreur s'est produite lors de la suppression du jeu : " . $e->getMessage();
// }
