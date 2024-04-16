<?php
require_once 'xampp/htdocs/DM/Nexus-gathering/src/dao/DaoNexus.php';
require_once 'Nexus-gathering/src/metier/Jeu.php';
require_once 'Nexus-gathering/src/dao/Requetes.php';

// Création d'une instance de la classe JeuDAO en passant une connexion PDO valide
$pdo = new PDO('mysql:host=localhost;dbname=nom_de_votre_base_de_donnees', 'utilisateur', 'mot_de_passe');
$jeuDAO = new JeuDAO($pdo);

// Appel de la fonction getJeux() pour obtenir les jeux
$jeux = $jeuDAO->getJeux();

// Affichage des jeux récupérés (à des fins de débogage)
var_dump($jeux);