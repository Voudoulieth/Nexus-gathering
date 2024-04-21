<?php

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use Nexus_gathering\dao\DaoNexus;
use Nexus_gathering\dao\DaoException;
use Nexus_gathering\metier\Jeu;
use Nexus_gathering\metier\Studio;
use Nexus_gathering\metier\Editeur;
use PHPUnit\Framework\TestCase;

class JeuTests extends TestCase
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

    public function testGetByIdJeuSuccess()
{
    // Configuration du PDOStatement
    $this->pdo->method('prepare')->willReturn($this->stmt);
    $this->stmt->method('execute')->willReturn(true);
    $this->stmt->method('fetch')->willReturn(['id_jeu' => 1, 'nom_jeu' => 'Nom du Jeu', 'resum_jeu' => 'Résumé du Jeu', 'img_jeu' => 'image.jpg', 'multi' => 1, 'id_ed' => 1, 'id_user' => 1, 'id_stu' => 1]);

    // Exécution de la fonction getByIdJeu
    $result = $this->dao->getById(1);

    // Vérification que la fonction retourne un objet Jeu
    $this->assertInstanceOf(Jeu::class, $result);
}

public function testGetByIdJeuReturnsNull()
{
    // Configuration du PDOStatement
    $this->pdo->method('prepare')->willReturn($this->stmt);
    $this->stmt->method('execute')->willReturn(true);
    $this->stmt->method('fetch')->willReturn(false);

    // Exécution de la fonction getByIdJeu
    $result = $this->dao->getById(1);

    // Vérification que la fonction retourne null
    $this->assertNull($result);
}

public function testGetAllJeuSuccess()
{
    // Configuration du PDOStatement
    $this->pdo->method('prepare')->willReturn($this->stmt);
    $this->stmt->method('execute')->willReturn(true);
    $this->stmt->method('fetch')->willReturnOnConsecutiveCalls(['id_jeu' => 1, 'nom_jeu' => 'Jeu 1'], ['id_jeu' => 2, 'nom_jeu' => 'Jeu 2']);

    // Exécution de la fonction getAllJeu
    $result = $this->dao->getAll();

    // Vérification que la fonction retourne un tableau d'objets Jeu
    $this->assertCount(2, $result);
    $this->assertInstanceOf(Jeu::class, $result[0]);
    $this->assertInstanceOf(Jeu::class, $result[1]);
}

public function testUpdateJeuSuccess()
{
    // Configuration du PDOStatement
    $this->pdo->method('prepare')->willReturn($this->stmt);
    $this->stmt->expects($this->once())->method('execute')->willReturn(true);

    // Exécution de la fonction updateJeu
    $result = $this->dao->update($this->jeu, $this->studio, $this->editeur);

    // Vérification que la fonction retourne true
    $this->assertTrue($result);
}

public function testUpdateJeuThrowsPDOException()
{
    $this->pdo->method('prepare')->willReturn($this->stmt);
    $this->stmt->method('execute')->will($this->throwException(new PDOException()));

    // On s'attend à ce que l'exception personnalisée soit lancée
    $this->expectException(DaoException::class);

    // Exécution de la fonction updateJeu
    $this->dao->update($this->jeu, $this->studio, $this->editeur);
}

public function testUpdateJeuThrowsException()
{
    $this->pdo->method('prepare')->willReturn($this->stmt);
    $this->stmt->method('execute')->will($this->throwException(new Exception()));

    // On s'attend à ce que l'exception personnalisée soit lancée
    $this->expectException(DaoException::class);

    // Exécution de la fonction updateJeu
    $this->dao->update($this->jeu, $this->studio, $this->editeur);
}

public function testDeleteJeuSuccess()
{
    // Configuration du PDOStatement
    $this->pdo->method('prepare')->willReturn($this->stmt);
    $this->stmt->expects($this->once())->method('execute')->willReturn(true);

    // Exécution de la fonction deleteJeu
    $result = $this->dao->delete(1);

    // Vérification que la fonction retourne true
    $this->assertTrue($result);
}

public function testDeleteJeuThrowsPDOException()
{
    $this->pdo->method('prepare')->willReturn($this->stmt);
    $this->stmt->method('execute')->will($this->throwException(new PDOException()));

    // On s'attend à ce que l'exception personnalisée soit lancée
    $this->expectException(DaoException::class);

    // Exécution de la fonction deleteJeu
    $this->dao->delete(1);
}

public function testDeleteJeuThrowsException()
{
    $this->pdo->method('prepare')->willReturn($this->stmt);
    $this->stmt->method('execute')->will($this->throwException(new Exception()));

    // On s'attend à ce que l'exception personnalisée soit lancée
    $this->expectException(DaoException::class);

    // Exécution de la fonction deleteJeu
    $this->dao->delete(1);
}
}