<?php
declare(strict_types=1);
namespace Nexus_gathering\metier;

class Question {

    private int    $id_question;
    private int    $id_quiz;
    private string $question_quiz;

    public function __construct(int $id_question, int $id_quiz, string $question_quiz) {
        $this->id_question   = $id_question;
        $this->id_quiz       = $id_quiz;
        $this->question_quiz = $question_quiz;
    }

    
    /**
     * Get the value of id_question
     */ 
    public function getId_question()
    {
        return $this->id_question;
    }
    
    /**
     * Get the value of id_quiz
     */ 
    public function getId_quiz()
    {
        return $this->id_quiz;
    }
    
    /**
     * Get the value of question_quiz
     */ 
    public function getQuestion_quiz()
    {
        return $this->question_quiz;
    }
    
    /**
     * Set the value of question_quiz
     *
     * @return  self
     */ 
    public function setQuestion_quiz($question_quiz)
    {
        $this->question_quiz = $question_quiz;
        
        return $this;
    }
    public function __toString(){
        return '[Question du quiz : ' . $this->id_question . ', ' . $this->id_quiz . ', ' . $this->question_quiz . ']';
    }
}