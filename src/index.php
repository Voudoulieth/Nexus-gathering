<?php

namespace Nexus_gathering;

use Nexus_gathering\controller\CntrlNexus;

require_once dirname(__DIR__, 1) . '/vendor/autoload.php';


if (file_exists("./param.ini")) {
    $param = parse_ini_file("./param.ini", true);
    extract($param['APPWEB']);       
}

define('APP_ROOT', $app_root_phpserver);
define('PUBLIC_ROOT', $public_root_phpserver);

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
        default                                 => $cntrlNexus->getIndex(),
    };
} elseif ($method == 'post') {
    match ($route) {
        default                              => $cntrlNexus->getIndex(),
    };
} else {
    $cntrlNexus->getIndex();
}    