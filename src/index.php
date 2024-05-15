<?php

namespace Nexus_gathering;

require_once dirname(__DIR__, 1) . '/vendor/autoload.php';

use Nexus_gathering\controller\CntrlNexus;
use Nexus_gathering\metier\DTOUser;
use Nexus_gathering\metier\RoleUtilisateur;
use Nexus_gathering\metier\Utilisateur;

if (file_exists("./param.ini")) {
    $param = parse_ini_file("./param.ini", true);
    extract($param['APPWEB']);       
}

define('APP_ROOT', $app_root_phpserver);
define('PUBLIC_ROOT', $public_root_phpserver);

// simulation d'un utilisateur en session
$role = new RoleUtilisateur(2, "Utilisateur");
$user = new DTOUser(1, "Michel", "user-solid blanc.svg", $role);

 session_start();
$_SESSION["user"] = $user;


$cntrlNexus = new CntrlNexus();

$uri = $_SERVER['REQUEST_URI'];
$route = explode('?', $uri)[0];
$method = strtolower($_SERVER['REQUEST_METHOD']);

// /                            get page acceuil
// /recherche-de-joueur         get page recherche de joueur
// /recherche-rapide            get page recherche rapide
// /recherche-rapide/resultat   get page recherche rapide résultat



if ($method == 'get') {
    match ($route) {
        APP_ROOT                                => $cntrlNexus->getIndex(),
        APP_ROOT . '/'                          => $cntrlNexus->getIndex(),
        APP_ROOT . '/recherche-de-joueur'       => $cntrlNexus->getRechercheDeJoueur(),
        APP_ROOT . '/recherche-rapide'          => $cntrlNexus->getRechercheRapide(),
        APP_ROOT . '/recherche-rapide/resultat' => $cntrlNexus->getRechercheRapideResultat(),
        APP_ROOT . '/recherche-par-annonce'     => $cntrlNexus->getRechercheParAnnonce(),
        APP_ROOT . '/rejoindre_une_annonce'     => $cntrlNexus->getRejoindreUneAnnonce(),
        APP_ROOT . '/creation_annonce'          => $cntrlNexus->getCreationAnnonce(),
        APP_ROOT . '/messagerie'                => $cntrlNexus->getMessagerie(),
        APP_ROOT . '/messagerie/contact'        => $cntrlNexus->getConversation(),
        default                                 => $cntrlNexus->getIndex(),
    };
} elseif ($method == 'post') {
    match ($route) {
        APP_ROOT . '/messagerie/create-message' => $cntrlNexus->createMessage(),
        APP_ROOT . '/messagerie/delete-message' => $cntrlNexus->deleteMessage(),
        APP_ROOT . '/messagerie/update-message' => $cntrlNexus->updateMessage(),
        default                                 => $cntrlNexus->getIndex(),
    };
} else {
    $cntrlNexus->getIndex();
}    