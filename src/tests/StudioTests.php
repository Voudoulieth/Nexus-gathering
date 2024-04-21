<?php

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use Nexus_gathering\dao\DaoNexus;
use Nexus_gathering\dao\DaoException;
use Nexus_gathering\metier\Studio;
use PHPUnit\Framework\TestCase;

class StudioTests extends TestCase
{
    private $pdo;
    private $stmt;
    private $dao;
    private $studio;

    protected function setUp(): void
    {
        $this->pdo = $this->createMock(PDO::class);
        $this->stmt = $this->createMock(PDOStatement::class);
        $this->dao = new DaoNexus($this->pdo);
        $this->studio = $this->createMock(Studio::class);
    }

    public function testCreateStudioSuccess()
    {
        // Configuration du PDOStatement
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->expects($this->once())->method('execute')->willReturn(true);

        // Exécution de la fonction createStudio
        $result = $this->dao->createStudio($this->studio);

        // Vérification que la fonction retourne true
        $this->assertTrue($result);
    }

    public function testCreateStudioThrowsPDOException()
    {
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->will($this->throwException(new PDOException()));

        // On s'attend à ce que l'exception personnalisée soit lancée
        $this->expectException(DaoException::class);

        // Exécution de la fonction createStudio
        $this->dao->createStudio($this->studio);
    }

    public function testCreateStudioThrowsException()
    {
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->will($this->throwException(new Exception()));

        // On s'attend à ce que l'exception personnalisée soit lancée
        $this->expectException(DaoException::class);

        // Exécution de la fonction createStudio
        $this->dao->createStudio($this->studio);
    }

    public function testGetByIdStudioSuccess()
    {
        // Configuration du PDOStatement
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->willReturn(true);
        $this->stmt->method('fetch')->willReturn(['id_stu' => 1, 'nom_stu' => 'Nom du Studio', 'id_ed' => 1]);
    
        // Exécution de la fonction getByIdStudio
        $result = $this->dao->getByIdStudio(1);
    
        // Vérification que la fonction retourne un objet Studio
        $this->assertInstanceOf(Studio::class, $result);
    }
    
    public function testGetAllStudioSuccess()
    {
        // Configuration du PDOStatement
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->willReturn(true);
        
        // Utilisation de willReturnOnConsecutiveCalls pour fournir plusieurs retours consécutifs
        $this->stmt->method('fetch')
                    ->willReturnOnConsecutiveCalls(
                        ['id_stu' => 1, 'nom_stu' => 'Studio 1', 'id_ed' => 1],
                        ['id_stu' => 2, 'nom_stu' => 'Studio 2', 'id_ed' => 1]
                    );
        
        // Exécution de la fonction getAllStudio
        $result = $this->dao->getAllStudio();
        
        // Vérification que la fonction retourne un tableau d'objets Studio
        $this->assertIsArray($result);
        $this->assertInstanceOf(Studio::class, $result[0]);
        $this->assertInstanceOf(Studio::class, $result[1]);
    }
    
    public function testUpdateStudioSuccess()
    {
        // Configuration du PDOStatement
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->expects($this->once())->method('execute')->willReturn(true);
    
        // Exécution de la fonction updateStudio
        $result = $this->dao->updateStudio($this->studio);
    
        // Vérification que la fonction retourne true
        $this->assertTrue($result);
    }
    
    public function testDeleteStudioSuccess()
    {
        // Configuration du PDOStatement
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->expects($this->once())->method('execute')->willReturn(true);
    
        // Exécution de la fonction deleteStudio
        $result = $this->dao->deleteStudio(1);
    
        // Vérification que la fonction retourne true
        $this->assertTrue($result);
    }
}