<?php
require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use Nexus_gathering\dao\DaoNexus;
use Nexus_gathering\dao\DaoException;
use Nexus_gathering\metier\Annonce;
use Nexus_gathering\metier\RechercheRapide;
use Nexus_gathering\metier\CreationUser;    
use Nexus_gathering\metier\Jeu;
use PHPUnit\Framework\TestCase;
use Nexus_gathering\metier\NiveauUtilisateur;

class NiveauUtilisateurTests extends TestCase
{
    private $niveau;

    protected function setUp(): void
    {
        parent::setUp();

        // Création d'un mock pour NiveauUtilisateur
        $this->niveau = new NiveauUtilisateur(1, 'Débutant', 'Description du niveau débutant');
    }

    public function testGetIdNiveau(): void
    {
        // Vérification que la méthode getIdNiveau retourne l'ID du niveau correct
        $this->assertEquals(1, $this->niveau->getIdNiveau());
    }

    public function testGetNomNiveau(): void
    {
        // Vérification que la méthode getNomNiveau retourne le nom du niveau correct
        $this->assertEquals('Débutant', $this->niveau->getNomNiveau());
    }

    public function testSetNomNiveau(): void
    {
        // Modification du nom du niveau
        $this->niveau->setNomNiveau('Avancé');

        // Vérification que le nom du niveau a été correctement mis à jour
        $this->assertEquals('Avancé', $this->niveau->getNomNiveau());
    }

    public function testGetDescription(): void
    {
        // Vérification que la méthode getDescription retourne la description correcte
        $this->assertEquals('Description du niveau débutant', $this->niveau->getDescription());
    }

    public function testSetDescription(): void
    {
        // Modification de la description du niveau
        $this->niveau->setDescription('Description du niveau avancé');

        // Vérification que la description du niveau a été correctement mise à jour
        $this->assertEquals('Description du niveau avancé', $this->niveau->getDescription());
    }
}


?>
