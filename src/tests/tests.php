<?php
require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use Nexus_gathering\dao\DaoNexus;
use Nexus_gathering\metier\Jeu;

$jeuDAO = new JeuDAO($pdo);

// Appel de la fonction getJeux() pour obtenir les jeux
$jeux = $jeuDAO->getJeux();

// Affichage des jeux récupérés (à des fins de débogage)
var_dump($jeux);