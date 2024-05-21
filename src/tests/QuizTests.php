<?php

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Nexus_gathering\metier\Quiz;
use Nexus_gathering\metier\CreationUser;
use Nexus_gathering\dao\DaoNexus;
use Nexus_gathering\dao\DaoException;

class QuizTests extends TestCase
{
    private $pdo;
    private $stmt;
    private $dao;
    private $quiz;
    private $creationUser;

    protected function setUp(): void
    {
        $this->pdo = $this->createMock(PDO::class);
        $this->stmt = $this->createMock(PDOStatement::class);
        $this->dao = new DaoNexus($this->pdo);

        $this->quiz = $this->createMock(Quiz::class);
        $this->quiz->method('getId_cat_quiz')->willReturn(1);
        $this->quiz->method('getTitre_quiz')->willReturn('Test Quiz');
        $this->quiz->method('getPhoto_quiz')->willReturn('photo.jpg');

        $this->creationUser = $this->createMock(CreationUser::class);
        $this->creationUser->method('getIdUser')->willReturn(1);
    }

    public function testCreateQuizSuccess()
    {
        // Configuration du PDOStatement
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->willReturn(true);

        // Exécution de la fonction createQuiz
        $result = $this->dao->createQuiz($this->quiz, $this->creationUser);

        // Vérification que la fonction retourne true
        $this->assertTrue($result);
    }

    public function testCreateQuizFailure()
    {
        // Configuration du PDOStatement pour simuler une exception
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->will($this->throwException(new \Exception()));

        // On s'attend à ce que l'exception personnalisée soit lancée
        $this->expectException(DaoException::class);

        // Exécution de la fonction createQuiz
        $this->dao->createQuiz($this->quiz, $this->creationUser);
    }

 
}
?>
