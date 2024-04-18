<?php

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use Nexus_gathering\dao\DaoNexus;
use Nexus_gathering\metier\Jeu;
use Nexus_gathering\metier\Studio;
use Nexus_gathering\metier\Editeur;

$dao = new DaoNexus();

class DaoTest extends TestCase
{
    private $pdo;
    private $stmt;
    private $dao;
    private $jeu;
    private $studio;
    private $editeur;

    protected function setUp(): void
    {
        $this->pdo = $this->createMock(PDO::class);
        $this->stmt = $this->createMock(PDOStatement::class);
        $this->dao = new DaoNexus($this->pdo);
        
        $this->jeu = $this->createMock(Jeu::class);
        $this->studio = $this->createMock(Studio::class);
        $this->editeur = $this->createMock(Editeur::class);
    }

    public function testCreateJeuSuccess()
    {
        // Configuration du PDOStatement
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->expects($this->once())->method('execute')->willReturn(true);

        // Exécution de la fonction createJeu
        $result = $this->dao->create($this->jeu, $this->studio, $this->editeur);

        // Vérification que la fonction retourne true
        $this->assertTrue($result);
    }

    public function testCreateJeuThrowsPDOException()
    {
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->will($this->throwException(new PDOException()));

        // On s'attend à ce que l'exception personnalisée soit lancée
        $this->expectException(DaoException::class);

        // Exécution de la fonction createJeu
        $this->dao->create($this->jeu, $this->studio, $this->editeur);
    }

    public function testCreateJeuThrowsException()
    {
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->will($this->throwException(new Exception()));

        // On s'attend à ce que l'exception personnalisée soit lancée
        $this->expectException(DaoException::class);

        // Exécution de la fonction createJeu
        $this->dao->create($this->jeu, $this->studio, $this->editeur);
    }
}