<?php

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use Nexus_gathering\dao\DaoNexus;


$dao = new DaoNexus();


// 1. Ajouter une nouvelle session de recherche rapide
echo "Ajout d'une nouvelle session de recherche rapide...\n";
$userId = 1;
$jeuId = 2;
if ($dao->addRechercheRapide($userId, $jeuId)) {
    echo "Session ajoutée avec succès.\n";
} else {
    echo "Échec de l'ajout de la session.\n";
}

// 2. Lire et afficher les sessions en cours
echo "\nSessions de recherche rapide en cours pour le jeu ID $jeuId :\n";
$sessions = $dao->getRechercheRapideByJeu($jeuId);
foreach ($sessions as $session) {
    echo "Session ID: {$session['id_session']}, Utilisateur: {$session['nom']}, Début: {$session['deb_session']}, Fin: {$session['fin_session']}\n";
}

// 3. Mettre à jour la session en changeant le jeu associé
$sessionId = 1; // ID hypothétique de la session ajoutée
$newJeuId = 3;
echo "\nMise à jour de la session $sessionId au jeu ID $newJeuId...\n";
if ($dao->updateRechercheRapide($sessionId, $newJeuId)) {
    echo "Mise à jour réussie.\n";
} else {
    echo "Échec de la mise à jour.\n";
}

// 4. Mettre fin à une session
echo "\nFin de la session $sessionId...\n";
if ($dao->endRechercheRapide($sessionId)) {
    echo "Session terminée avec succès.\n";
} else {
    echo "Échec de la fin de la session.\n";
}

// 5. Supprimer la session
echo "\nSuppression de la session $sessionId...\n";
if ($dao->deleteRechercheRapide($sessionId)) {
    echo "Session supprimée avec succès.\n";
} else {
    echo "Échec de la suppression de la session.\n";
}