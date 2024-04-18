<?php

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use Nexus_gathering\dao\DaoNexus;
use Nexus_gathering\dao\DaoException;
use Nexus_gathering\metier\Messages;
use Nexus_gathering\metier\CreationUser;    
use Nexus_gathering\metier\Jeu;
use PHPUnit\Framework\TestCase;

class MessageTests extends TestCase
{
    private $pdo;
    private $stmt;
    private $dao;
    private $message;

    protected function setUp(): void
    {
        $this->pdo = $this->createMock(PDO::class);
        $this->stmt = $this->createMock(PDOStatement::class);
        $this->dao = new DaoNexus($this->pdo);
    
        $this->message = $this->createMock(Messages::class);
        $this->message->method('getContenuMess')->willReturn('Bonjour');
        $this->message->method('getIdExped')->willReturn(1);
        $this->message->method('getIdDesti')->willReturn(2);
    }
    
    

    public function testCreateMessageSuccess()
    {
        // Configuration du PDOStatement
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->expects($this->once())->method('execute')->willReturn(true);

        // Exécution de la fonction createMessage
        $result = $this->dao->createMessage($this->message);

        // Vérification que la fonction retourne true
        $this->assertTrue($result);
    }

    public function testCreateMessageThrowsPDOException()
    {
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->will($this->throwException(new PDOException()));

        // On s'attend à ce que l'exception personnalisée soit lancée
        $this->expectException(DaoException::class);

        // Exécution de la fonction createMessage
        $this->dao->createMessage($this->message);
    }

    public function testCreateMessageThrowsException()
    {
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->will($this->throwException(new Exception()));

        // On s'attend à ce que l'exception personnalisée soit lancée
        $this->expectException(DaoException::class);

        // Exécution de la fonction createMessage
        $this->dao->createMessage($this->message);
    }

    public function testGetConversationMessages()
    {
        // Configuration du PDOStatement
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->expects($this->once())->method('execute')->willReturn(true);
        $this->stmt->method('fetchAll')->willReturn([
            ['id' => 1, 'content' => 'Hello', 'id_exped' => 1, 'id_desti' => 2],
            ['id' => 2, 'content' => 'Hi', 'id_exped' => 2, 'id_desti' => 1]
        ]);
    
        // Exécution de la fonction getConversationMessages
        $result = $this->dao->getConversationMessages($this->message);
    
        // Vérification que la fonction retourne les données attendues
        $this->assertCount(2, $result);
        $this->assertEquals('Hello', $result[0]['content']);
        $this->assertEquals('Hi', $result[1]['content']);
    }
    
    public function testGetConversationMessagesPDOException()
    {
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->will($this->throwException(new \PDOException()));
    
        // On s'attend à ce que l'exception personnalisée soit lancée
        $this->expectException(DaoException::class);
    
        // Exécution de la fonction getConversationMessages
        $this->dao->getConversationMessages($this->message);
    }
    
    public function testGetUserConversations()
    {
        // Configuration du PDOStatement
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->expects($this->once())->method('execute')->willReturn(true);
        $this->stmt->method('fetchAll')->willReturn([
            ['id_user' => 1, 'nom_user' => 'John Doe', 'last_message_date' => '2022-01-01 12:00:00'],
            ['id_user' => 2, 'nom_user' => 'Jane Doe', 'last_message_date' => '2022-01-02 13:00:00']
        ]);

        // Exécution de la fonction getUserConversations
        $result = $this->dao->getUserConversations($this->creationUser);

        // Vérification que la fonction retourne les données attendues
        $this->assertCount(2, $result);
        $this->assertEquals('John Doe', $result[0]['nom_user']);
        $this->assertEquals('Jane Doe', $result[1]['nom_user']);
    }

    public function testGetUserConversationsPDOException()
    {
        $this->pdo->method('prepare')->willReturn($this->stmt);
        $this->stmt->method('execute')->will($this->throwException(new \PDOException()));

        // On s'attend à ce que l'exception personnalisée soit lancée
        $this->expectException(DaoException::class);

        // Exécution de la fonction getUserConversations
        $this->dao->getUserConversations($this->creationUser);
    }




}
