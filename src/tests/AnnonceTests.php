<?php

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use Nexus_gathering\dao\DaoNexus;
use Nexus_gathering\dao\DaoException;
use Nexus_gathering\metier\Annonce;
use Nexus_gathering\metier\RechercheRapide;
use Nexus_gathering\metier\CreationUser;    
use Nexus_gathering\metier\Jeu;
use PHPUnit\Framework\TestCase;

class AnnonceTests extends TestCase
{
    private $pdo;
    private $stmt;
    private $dao;
    private $annonce;
    private $creationUser;
    private $jeu;

    protected function setUp(): void
    {
        $this->pdo = $this->createMock(PDO::class);
        $this->stmt = $this->createMock(PDOStatement::class);
        $this->dao = new DaoNexus($this->pdo);
    
        $this->annonce = $this->createMock(Annonce::class);
        $this->creationUser = $this->createMock(CreationUser::class);
        $this->creationUser->method('getIdUser')->willReturn(1);
        $this->jeu = $this->createMock(Jeu::class);
        $this->jeu->method('getId_jeu')->willReturn(1);
    }

    public function testCreateAnnonceSuccess()
    {
        // Configuration du PDOStatement
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->willReturn(true);
        $this->stmt->method('rowCount')->willReturn(1);  // Simule une ligne affectée

        // Exécution de la fonction createAnnonce
        $result = $this->dao->createAnnonce($this->annonce, $this->creationUser, $this->jeu);

        // Vérification que la fonction retourne true
        $this->assertTrue($result);
    }

    public function testCreateAnnonceFailure()
    {
        // Configuration du PDOStatement
        $this->pdo->method('prepare')->willReturn($this->stmt);
         $this->stmt->method('execute')->willReturn(true);
        $this->stmt->method('rowCount')->willReturn(0);  // Simule aucune ligne affectée

         // Exécution de la fonction createAnnonce
        $result = $this->dao->createAnnonce($this->annonce, $this->creationUser, $this->jeu);

        // Vérification que la fonction retourne false
         $this->assertFalse($result);
    }

    public function testCreateAnnoncePDOException()
    {
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->will($this->throwException(new \PDOException()));

        // On s'attend à ce que l'exception personnalisée soit lancée
        $this->expectException(DaoException::class);

        // Exécution de la fonction createAnnonce
        $this->dao->createAnnonce($this->annonce, $this->creationUser, $this->jeu);
    }

    public function testCreateAnnonceException()
    {
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->will($this->throwException(new \Exception()));

        // On s'attend à ce que l'exception personnalisée soit lancée
        $this->expectException(DaoException::class);

        // Exécution de la fonction createAnnonce
        $this->dao->createAnnonce($this->annonce, $this->creationUser, $this->jeu);
    }

    public function testReadAnnonceSuccess()
    {
         // Configuration du PDOStatement
         $this->pdo->method('prepare')->willReturn($this->stmt);
         $this->stmt->method('execute')->with([$this->annonce->getIdAnnonce()])->willReturn(true);
         $this->stmt->method('fetch')->willReturn([
             'id_annonce' => 1,
            'nom_annonce' => 'Big Game Night',
            'desc_annonce' => 'Join us for a fun night of board games.'
        ]);

        // Exécution de la fonction readAnnonce
        $result = $this->dao->readAnnonce($this->annonce);

        // Vérification que la fonction retourne les données attendues
        $this->assertEquals('Big Game Night', $result['nom_annonce']);
    }

    public function testReadAnnonceNoRecord()
    {
        // Configuration du PDOStatement
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->willReturn(true);
        $this->stmt->method('fetch')->willReturn(false);  // Simuler qu'aucun enregistrement n'est trouvé

        // Exécution de la fonction readAnnonce
        $result = $this->dao->readAnnonce($this->annonce);

        // Vérification que la fonction retourne false
        $this->assertFalse($result);
    }

    public function testReadAnnoncePDOException()
    {
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->will($this->throwException(new \PDOException()));

        // On s'attend à ce que l'exception personnalisée soit lancée
        $this->expectException(DaoException::class);

        // Exécution de la fonction readAnnonce
        $this->dao->readAnnonce($this->annonce);
    }

    public function testReadAnnonceException()
    {
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->will($this->throwException(new \Exception()));

        // On s'attend à ce que l'exception personnalisée soit lancée
        $this->expectException(DaoException::class);

        // Exécution de la fonction readAnnonce
        $this->dao->readAnnonce($this->annonce);
    }

    public function testReadAllAnnoncesSuccess()
    {
        // Configuration du PDOStatement
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->willReturn(true);
        $this->stmt->method('fetchAll')->willReturn([
            ['id_annonce' => 1, 'nom_annonce' => 'Game Night', 'desc_annonce' => 'Lots of games!'],
            ['id_annonce' => 2, 'nom_annonce' => 'Board Game Bash', 'desc_annonce' => 'Come play with us.']
        ]);

        // Exécution de la fonction readAllAnnonces
        $result = $this->dao->readAllAnnonces();

        // Vérification que la fonction retourne un tableau non vide
        $this->assertNotEmpty($result);
        $this->assertCount(2, $result);  // Vérification que deux annonces sont retournées
        $this->assertEquals('Game Night', $result[0]['nom_annonce']);
    }

    public function testReadAllAnnoncesEmpty()
    {
        // Configuration du PDOStatement
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->willReturn(true);
        $this->stmt->method('fetchAll')->willReturn([]);

        // Exécution de la fonction readAllAnnonces
        $result = $this->dao->readAllAnnonces();

        // Vérification que la fonction retourne un tableau vide
        $this->assertEmpty($result);
    }

    public function testReadAllAnnoncesPDOException()
    {
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->will($this->throwException(new \PDOException()));

        // On s'attend à ce que l'exception personnalisée soit lancée
        $this->expectException(DaoException::class);

        // Exécution de la fonction readAllAnnonces
        $this->dao->readAllAnnonces();
    }

    public function testReadAllAnnoncesException()
    {
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->will($this->throwException(new \Exception()));

        // On s'attend à ce que l'exception personnalisée soit lancée
        $this->expectException(DaoException::class);

        // Exécution de la fonction readAllAnnonces
        $this->dao->readAllAnnonces();
    }

    public function testUpdateAnnonceSuccess()
    {
        // Configuration du PDOStatement
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->willReturn(true);
        $this->stmt->method('rowCount')->willReturn(1);  // Simule que la mise à jour a affecté une ligne

        // Exécution de la fonction updateAnnonce
        $result = $this->dao->updateAnnonce($this->annonce, $this->creationUser, $this->jeu);

        // Vérification que la fonction retourne true (mise à jour réussie)
        $this->assertTrue($result);
    }

    public function testUpdateAnnonceFailure()
    {
        // Configuration du PDOStatement
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->willReturn(true);
        $this->stmt->method('rowCount')->willReturn(0);  // Simule qu'aucune ligne n'a été affectée

        // Exécution de la fonction updateAnnonce
        $result = $this->dao->updateAnnonce($this->annonce, $this->creationUser, $this->jeu);

        // Vérification que la fonction retourne false (pas de mise à jour)
        $this->assertFalse($result);
    }

    public function testUpdateAnnoncePDOException()
    {
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->will($this->throwException(new \PDOException()));

        // On s'attend à ce que l'exception personnalisée soit lancée
        $this->expectException(DaoException::class);

        // Exécution de la fonction updateAnnonce
        $this->dao->updateAnnonce($this->annonce, $this->creationUser, $this->jeu);
    }

    public function testUpdateAnnonceException()
    {
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->will($this->throwException(new \Exception()));

        // On s'attend à ce que l'exception personnalisée soit lancée
        $this->expectException(DaoException::class);

        // Exécution de la fonction updateAnnonce
        $this->dao->updateAnnonce($this->annonce, $this->creationUser, $this->jeu);
    }

    public function testDeleteAnnonceSuccess()
    {
        // Configuration du PDOStatement
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->willReturn(true);
        $this->stmt->method('rowCount')->willReturn(1);  // Simule la suppression d'une ligne

        // Exécution de la fonction deleteAnnonce
        $result = $this->dao->deleteAnnonce($this->annonce);

        // Vérification que la fonction retourne true (suppression réussie)
        $this->assertTrue($result);
    }

    public function testDeleteAnnonceFailure()
    {
        // Configuration du PDOStatement
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->willReturn(true);
        $this->stmt->method('rowCount')->willReturn(0);  // Simule qu'aucune ligne n'a été affectée

        // Exécution de la fonction deleteAnnonce
        $result = $this->dao->deleteAnnonce($this->annonce);

        // Vérification que la fonction retourne false (aucune suppression effectuée)
        $this->assertFalse($result);
    }

    public function testDeleteAnnoncePDOException()
    {
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->will($this->throwException(new \PDOException()));

        // On s'attend à ce que l'exception personnalisée soit lancée
        $this->expectException(DaoException::class);

        // Exécution de la fonction deleteAnnonce
        $this->dao->deleteAnnonce($this->annonce);
    }

    public function testDeleteAnnonceException()
    {
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->will($this->throwException(new \Exception()));

        // On s'attend à ce que l'exception personnalisée soit lancée
        $this->expectException(DaoException::class);

        // Exécution de la fonction deleteAnnonce
        $this->dao->deleteAnnonce($this->annonce);
    }

}