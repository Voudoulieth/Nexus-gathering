<?php

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use Nexus_gathering\dao\DaoNexus;
use Nexus_gathering\metier\Annonce;



$dao = new DaoNexus();
// Création d'une annonce
echo "Création d'une nouvelle annonce...\n";
$annonce = new Annonce(4, "Tournoi de bienvenue", 10, "Venez rejoindre notre tournoi inaugural!", 1, 1);
if ($dao->createAnnonce($annonce)) {
    echo "Annonce créée avec succès.\n";
} else {
    echo "Échec de la création de l'annonce.\n";
}

// Lecture de l'annonce
$id_annonce = 1;
echo "\nLecture de l'annonce ID $id_annonce :\n";
$annonceData = $dao->readAnnonce($id_annonce);
echo "Annonce lue: " . print_r($annonceData, true) . "\n";

// Mise à jour de l'annonce
$annonce->setNomAnnonce("Tournoi annuel");
$annonce->setNbUser(20);
if ($dao->updateAnnonce($annonce)) {
    echo "Annonce mise à jour avec succès.\n";
} else {
    echo "Échec de la mise à jour.\n";
}



// Suppression de l'annonce
if ($dao->deleteAnnonce($id_annonce)) {
    echo "Annonce supprimée avec succès.\n";
} else {
    echo "Échec de la suppression de l'annonce.\n";
}