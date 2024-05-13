<?php

declare(strict_types=1);

namespace Nexus_gathering\controller;

use Nexus_gathering\dao\DaoNexus;
use Nexus_gathering\metier\CreationUser;

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
        // $id_jeu             = htmlspecialchars(trim($_GET['id']));

        // $id_jeu = (int)$id_jeu;     // conversion en int

        // $jeu = $this->DaoNexus->getById($id_jeu);

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
        $creationUser = $_SESSION["user"];
        if (!isset($creationUser)) { 
            header('Location: login.php'); 
            exit;
        }
        $contacts = $this->DaoNexus->getUserConversations($creationUser);
        //var_dump($contacts);
        require './view/recherche_de_joueur/messagerie.php';
    }
    public function getConversation()
    {
        $creationUser = $_SESSION["user"];
        if (!isset($creationUser)) { 
            header('Location: login.php'); 
            exit;
        }
        if (isset($_GET['id'])) {
            $idContact             = htmlspecialchars(trim($_GET['id']));
            $idContact = (int)$idContact;     // conversion en int
            $rubrique = $this->DaoNexus->getConversationMessages($creationUser, $idContact);
        }
    }
}