<?php
declare(strict_types=1);
namespace Nexus_Gathering\tests;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

require 'C:\Users\fauri\OneDrive\Bureau\httpd\xampp\htdocs\Nexus_gathering\vendor\autoload.php';

use Nexus_gathering\dao\DaoNexus;
use Nexus_gathering\metier\Jeu;
use Nexus_gathering\metier\Quiz;
use Nexus_gathering\metier\Question;
use Nexus_gathering\metier\Reponse;
use Nexus_gathering\metier\Categorie;
use Nexus_gathering\metier\JouerQuiz;   

// $jeuDAO = new JeuDAO($pdo);

// // Appel de la fonction getJeux() pour obtenir les jeux
// $jeux = $jeuDAO->getJeux();

// // Affichage des jeux récupérés (à des fins de débogage)
// var_dump($jeux);

$dao = new DaoNexus();

?>