<?php

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use Nexus_gathering\dao\DaoNexus;
use Nexus_gathering\dao\DaoException;
use Nexus_gathering\metier\RechercheRapide;
use Nexus_gathering\metier\CreationUser;    
use Nexus_gathering\metier\Jeu;
use PHPUnit\Framework\TestCase;

class RechercheRapideTests extends TestCase
{
    private $pdo;
    private $stmt;
    private $dao;
    private $rechercheRapide;
    private $creationUser;
    private $jeu;

    protected function setUp(): void
    {
        $this->pdo = $this->createMock(PDO::class);
        $this->stmt = $this->createMock(PDOStatement::class);
        $this->dao = new DaoNexus($this->pdo);
    
        $this->rechercheRapide = $this->createMock(RechercheRapide::class);
        $this->creationUser = $this->createMock(CreationUser::class);
        $this->creationUser->method('getIdUser')->willReturn(1);
        $this->jeu = $this->createMock(Jeu::class);
        $this->jeu->method('getId_jeu')->willReturn(1);
    }

    public function testAddRechercheRapideSuccess()
    {
        // Configuration du PDOStatement
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->willReturn(true);

        // Exécution de la fonction addRechercheRapide
        $result = $this->dao->addRechercheRapide($this->creationUser, $this->jeu);

        // Vérification que la fonction retourne true
         $this->assertTrue($result);
    }

    public function testAddRechercheRapideFailure()
    {
        // Configuration du PDOStatement
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->willReturn(false);

        // Exécution de la fonction addRechercheRapide
        $result = $this->dao->addRechercheRapide($this->creationUser, $this->jeu);

        // Vérification que la fonction retourne false
        $this->assertFalse($result);
    }

    public function testAddRechercheRapidePDOException()
    {
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->will($this->throwException(new \PDOException()));

        // On s'attend à ce que l'exception personnalisée soit lancée
        $this->expectException(DaoException::class);

        // Exécution de la fonction addRechercheRapide
       $this->dao->addRechercheRapide($this->creationUser, $this->jeu);
    }

    public function testAddRechercheRapideException()
    {
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->will($this->throwException(new \Exception()));

        // On s'attend à ce que l'exception personnalisée soit lancée
        $this->expectException(DaoException::class);

       // Exécution de la fonction addRechercheRapide
       $this->dao->addRechercheRapide($this->creationUser, $this->jeu);
    }

    public function testGetRechercheRapideByJeuSuccess()
    {
        // Configuration du PDOStatement
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->willReturn(true);
        $this->stmt->method('fetchAll')->willReturn([
            ['id_session' => 1, 'nom' => 'John Doe', 'deb_session' => '2021-06-01 12:00:00', 'fin_session' => null],
            ['id_session' => 2, 'nom' => 'Jane Smith', 'deb_session' => '2021-06-01 13:00:00', 'fin_session' => '2021-06-01 14:00:00']
        ]);

        // Exécution de la fonction getRechercheRapideByJeu
        $result = $this->dao->getRechercheRapideByJeu($this->jeu);

        // Vérification que la fonction retourne les données attendues
        $this->assertCount(2, $result);
        $this->assertEquals('John Doe', $result[0]['nom']);
    }

    public function testGetRechercheRapideByJeuPDOException()
    {
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->will($this->throwException(new \PDOException()));

        // On s'attend à ce que l'exception personnalisée soit lancée
        $this->expectException(DaoException::class);

        // Exécution de la fonction getRechercheRapideByJeu
        $this->dao->getRechercheRapideByJeu($this->jeu);
    }

    public function testGetRechercheRapideByJeuException()
    {
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->will($this->throwException(new \Exception()));

        // On s'attend à ce que l'exception personnalisée soit lancée
        $this->expectException(DaoException::class);

        // Exécution de la fonction getRechercheRapideByJeu
        $this->dao->getRechercheRapideByJeu($this->jeu);
    }   

    public function testUpdateRechercheRapideSuccess()
    {
        // Configuration du PDOStatement
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->willReturn(true);

        // Exécution de la fonction updateRechercheRapide
        $result = $this->dao->updateRechercheRapide($this->jeu, $this->rechercheRapide);

        // Vérification que la fonction retourne true
        $this->assertTrue($result);
    }

    public function testUpdateRechercheRapideFailure()
    {
        // Configuration du PDOStatement
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->willReturn(false);

        // Exécution de la fonction updateRechercheRapide
        $result = $this->dao->updateRechercheRapide($this->jeu, $this->rechercheRapide);

        // Vérification que la fonction retourne false
        $this->assertFalse($result);
    }

    public function testUpdateRechercheRapidePDOException()
    {
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->will($this->throwException(new \PDOException()));

        // On s'attend à ce que l'exception personnalisée soit lancée
        $this->expectException(DaoException::class);

        // Exécution de la fonction updateRechercheRapide
        $this->dao->updateRechercheRapide($this->jeu, $this->rechercheRapide);
    }

    public function testUpdateRechercheRapideException()
    {
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->will($this->throwException(new \Exception()));

        // On s'attend à ce que l'exception personnalisée soit lancée
        $this->expectException(DaoException::class);

        // Exécution de la fonction updateRechercheRapide
        $this->dao->updateRechercheRapide($this->jeu, $this->rechercheRapide);
    }

    public function testEndRechercheRapideSuccess()
    {
        // Configuration du PDOStatement
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->willReturn(true);

        // Exécution de la fonction endRechercheRapide
        $result = $this->dao->endRechercheRapide($this->rechercheRapide);

        // Vérification que la fonction retourne true
        $this->assertTrue($result);
    }

    public function testEndRechercheRapideFailure()
    {
        // Configuration du PDOStatement
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->willReturn(false);

        // Exécution de la fonction endRechercheRapide
        $result = $this->dao->endRechercheRapide($this->rechercheRapide);

        // Vérification que la fonction retourne false
        $this->assertFalse($result);
    }

    public function testEndRechercheRapidePDOException()
    {
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->will($this->throwException(new \PDOException()));

        // On s'attend à ce que l'exception personnalisée soit lancée
        $this->expectException(DaoException::class);

        // Exécution de la fonction endRechercheRapide
        $this->dao->endRechercheRapide($this->rechercheRapide);
    }

    public function testEndRechercheRapideException()
    {   
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->will($this->throwException(new \Exception()));

        // On s'attend à ce que l'exception personnalisée soit lancée
        $this->expectException(DaoException::class);

        // Exécution de la fonction endRechercheRapide
        $this->dao->endRechercheRapide($this->rechercheRapide);
    }

    public function testDeleteRechercheRapideSuccess()
    {
        // Configuration du PDOStatement
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->willReturn(true);

        // Exécution de la fonction deleteRechercheRapide
        $result = $this->dao->deleteRechercheRapide($this->rechercheRapide);

        // Vérification que la fonction retourne true
        $this->assertTrue($result);
    }

    public function testDeleteRechercheRapideFailure()
    {
        // Configuration du PDOStatement
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->willReturn(false);

        // Exécution de la fonction deleteRechercheRapide
        $result = $this->dao->deleteRechercheRapide($this->rechercheRapide);

        // Vérification que la fonction retourne false
        $this->assertFalse($result);
    }

    public function testDeleteRechercheRapidePDOException()
    {
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->will($this->throwException(new \PDOException()));

        // On s'attend à ce que l'exception personnalisée soit lancée
        $this->expectException(DaoException::class);

        // Exécution de la fonction deleteRechercheRapide
        $this->dao->deleteRechercheRapide($this->rechercheRapide);
    }

    public function testDeleteRechercheRapideException()
    {   
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->will($this->throwException(new \Exception()));

        // On s'attend à ce que l'exception personnalisée soit lancée
        $this->expectException(DaoException::class);

        // Exécution de la fonction deleteRechercheRapide
        $this->dao->deleteRechercheRapide($this->rechercheRapide);
    }
}