<?php

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

// require 'C:\Users\fauri\OneDrive\Bureau\httpd\xampp\htdocs\Nexus_gathering\vendor\autoload.php';

use Nexus_gathering\dao\DaoNexus;
use Nexus_gathering\metier\Jeu;
use Nexus_gathering\metier\RoleUtilisateur;

$jeuDAO = new RoleUtilisateur(1,"admin");

var_dump($jeuDAO);

?>
