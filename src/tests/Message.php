<?php
require_once '/XAMPP/htdocs/DM/Nexus_gathering/src/dao/DaoNexus.php';  // Assurez-vous que le chemin est correct
require_once '/XAMPP/htdocs/DM/Nexus_gathering/src/dao/DataBase.php';

// Créer une instance de la classe DAO
$dao = new Nexus_gathering\src\dao\Nexus_gathering();

// <?php

// declare(strict_types=1);
// namespace Nexus_gathering\src\test;

// use Nexus_gathering\src\dao\DaoNexus;
// use Nexus_gathering\src\dao\Database;


// // Créer une instance de la classe DAO
// $dao = new Nexus_gathering();

// Définir les données de test
$contenu = "Ceci est un message test.";
$idExped = 2;  // Assurez-vous que cet ID existe
$idDesti = 3;  // Assurez-vous que cet ID existe
$dateMessageId = 1;  // Assurez-vous que cet ID existe

// Appeler la fonction createMessage
$result = $dao->createMessage($contenu, $idExped, $idDesti, $dateMessageId);

// Afficher le résultat
if ($result) {
    echo "Le message a été créé avec succès.";
} else {
    echo "Erreur lors de la création du message.";
}
