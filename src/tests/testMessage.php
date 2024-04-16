<?php
// Inclure l'autoloader de Composer en premier pour configurer l'autoloading
require_once dirname(__DIR__, 2) . '/vendor/autoload.php';
// Utilisation de l'espace de noms pour simplifier l'instanciation des objets
use Nexus_gathering\dao\DaoNexus as DaoNexusDAO;
use Nexus_gathering\dao\DataBase;
var_dump(class_exists('Nexus_gathering\src\dao\Nexus_gathering'));
// Créer une instance de la classe DAO
$dao = new DaoNexusDAO();

// Définir les données de test
$contenu = "Ceci est un message test.";
$idExped = 2;  // Assurez-vous que cet ID existe dans votre base de données
$idDesti = 3;  // Assurez-vous que cet ID existe dans votre base de données
$dateMessageId = 1;  // Assurez-vous que cet ID existe dans votre base de données

// Appeler la fonction createMessage pour insérer un nouveau message
$result = $dao->createMessage($contenu, $idExped, $idDesti, $dateMessageId);

// Afficher le résultat de l'opération
if ($result) {
    echo "Le message a été créé avec succès.";
} else {
    echo "Erreur lors de la création du message.";
}
