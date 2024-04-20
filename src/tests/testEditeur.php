<?php

use Nexus_gathering\dao\DaoNexus;
use Nexus_gathering\dao\DaoException;
use Nexus_gathering\metier\Editeur;

class DaoEditeurTest extends TestCase
{
    private $pdo;
    private $stmt;
    private $dao;
    private $editeur;

    protected function setUp(): void
    {
        $this->pdo = $this->createMock(PDO::class);
        $this->stmt = $this->createMock(PDOStatement::class);
        $this->dao = new DaoNexus($this->pdo);
        $this->editeur = $this->createMock(Editeur::class);
    }

    // Tests pour les méthodes liées aux éditeurs
    public function testCreateEditeurSuccess()
    {
        // Configuration du PDOStatement
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->expects($this->once())->method('execute')->willReturn(true);

        // Exécution de la fonction createEditeur
        $result = $this->dao->createEditeur($this->editeur);

        // Vérification que la fonction retourne true
        $this->assertTrue($result);
    }

    public function testCreateEditeurThrowsPDOException()
    {
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->will($this->throwException(new PDOException()));

        // On s'attend à ce que l'exception personnalisée soit lancée
        $this->expectException(DaoException::class);

        // Exécution de la fonction createEditeur
        $this->dao->createEditeur($this->editeur);
    }

    public function testCreateEditeurThrowsException()
    {
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->will($this->throwException(new Exception()));

        // On s'attend à ce que l'exception personnalisée soit lancée
        $this->expectException(DaoException::class);

        // Exécution de la fonction createEditeur
        $this->dao->createEditeur($this->editeur);
    }

    public function testGetByIdEditeurSuccess()
{
    // Configuration du PDOStatement
    $this->pdo->method('prepare')->willReturn($this->stmt);
    $this->stmt->method('execute')->willReturn(true);
    $this->stmt->method('fetch')->willReturn(['id_ed' => 1, 'nom_ed' => 'Editeur']);

    // Exécution de la fonction getByIdEditeur
    $result = $this->dao->getByIdEditeur(1);

    // Vérification que la fonction retourne un objet Editeur
    $this->assertInstanceOf(Editeur::class, $result);
}

public function testGetByIdEditeurReturnsNull()
{
    // Configuration du PDOStatement
    $this->pdo->method('prepare')->willReturn($this->stmt);
    $this->stmt->method('execute')->willReturn(true);
    $this->stmt->method('fetch')->willReturn(false);

    // Exécution de la fonction getByIdEditeur
    $result = $this->dao->getByIdEditeur(1);

    // Vérification que la fonction retourne null
    $this->assertNull($result);
}

public function testGetAllEditeurSuccess()
{
    // Configuration du PDOStatement
    $this->pdo->method('prepare')->willReturn($this->stmt);
    $this->stmt->method('execute')->willReturn(true);
    $this->stmt->method('fetch')->willReturnOnConsecutiveCalls(['id_ed' => 1, 'nom_ed' => 'Editeur 1'], ['id_ed' => 2, 'nom_ed' => 'Editeur 2']);

    // Exécution de la fonction getAllEditeur
    $result = $this->dao->getAllEditeur();

    // Vérification que la fonction retourne un tableau d'objets Editeur
    $this->assertCount(2, $result);
    $this->assertInstanceOf(Editeur::class, $result[0]);
    $this->assertInstanceOf(Editeur::class, $result[1]);
}

public function testUpdateEditeurSuccess()
{
    // Configuration du PDOStatement
    $this->pdo->method('prepare')->willReturn($this->stmt);
    $this->stmt->expects($this->once())->method('execute')->willReturn(true);

    // Exécution de la fonction updateEditeur
    $result = $this->dao->updateEditeur($this->editeur);

    // Vérification que la fonction retourne true
    $this->assertTrue($result);
}

public function testUpdateEditeurThrowsPDOException()
{
    $this->pdo->method('prepare')->willReturn($this->stmt);
    $this->stmt->method('execute')->will($this->throwException(new PDOException()));

    // On s'attend à ce que l'exception personnalisée soit lancée
    $this->expectException(DaoException::class);

    // Exécution de la fonction updateEditeur
    $this->dao->updateEditeur($this->editeur);
}

public function testUpdateEditeurThrowsException()
{
    $this->pdo->method('prepare')->willReturn($this->stmt);
    $this->stmt->method('execute')->will($this->throwException(new Exception()));

    // On s'attend à ce que l'exception personnalisée soit lancée
    $this->expectException(DaoException::class);

    // Exécution de la fonction updateEditeur
    $this->dao->updateEditeur($this->editeur);
}

public function testDeleteEditeurSuccess()
{
    // Configuration du PDOStatement
    $this->pdo->method('prepare')->willReturn($this->stmt);
    $this->stmt->expects($this->once())->method('execute')->willReturn(true);

    // Exécution de la fonction deleteEditeur
    $result = $this->dao->deleteEditeur(1);

    // Vérification que la fonction retourne true
    $this->assertTrue($result);
}

public function testDeleteEditeurThrowsPDOException()
{
    $this->pdo->method('prepare')->willReturn($this->stmt);
    $this->stmt->method('execute')->will($this->throwException(new PDOException()));

    // On s'attend à ce que l'exception personnalisée soit lancée
    $this->expectException(DaoException::class);

    // Exécution de la fonction deleteEditeur
    $this->dao->deleteEditeur(1);
}

public function testDeleteEditeurThrowsException()
{
    $this->pdo->method('prepare')->willReturn($this->stmt);
    $this->stmt->method('execute')->will($this->throwException(new Exception()));

    // On s'attend à ce que l'exception personnalisée soit lancée
    $this->expectException(DaoException::class);

    // Exécution de la fonction deleteEditeur
    $this->dao->deleteEditeur(1);
}
}
