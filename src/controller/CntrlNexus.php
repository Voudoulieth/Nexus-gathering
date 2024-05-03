<?php

declare(strict_types=1);

namespace Nexus_gathering\controller;

use Nexus_gathering\dao\DaoNexus;

class CntrlNexus{

    public function __construct(
        private DaoNexus $DaoNexus = new DaoNexus()
    ) {
    }

    public function getIndex()
    {
        require './view/index.php';
    }
    public function getRechercheDeJoueur()
    {
        require './view/recherche_de_joueur/recherche_de_joueurs.php';
    }
    public function getRechercheRapide()
    {
        $jeux = $this->DaoNexus->getAll();
        require './view/recherche_de_joueur/recherche_rapide.php';
    }
    public function getRechercheRapideResultat()
    {
        require './view/recherche_de_joueur/recherche_rapide_resultat.php';
    }
    public function getRechercheParAnnonce()
    {
        require './view/recherche_de_joueur/recherche_par_annonce.php';
    }
    public function getRejoindreUneAnnonce()
    {
        require './view/recherche_de_joueur/rejoindre_une_annonce.php';
    }
    public function getCreationAnnonce()
    {
        require './view/recherche_de_joueur/creation_annonce.php';
    }
    public function getMessagerie()
    {
        require './view/recherche_de_joueur/messagerie.php';
    }
}