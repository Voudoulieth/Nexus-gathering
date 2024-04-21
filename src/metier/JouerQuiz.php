<?php
declare(strict_types=1);
namespace Nexus_gathering\metier;

class JouerQuiz {

    private int    $id_user;
    private int    $id_quiz;
    private int $score_quiz;

    public function __construct(int $id_user, int $id_quiz, int $score_quiz) {
        $this->id_user   = $id_user;
        $this->id_quiz       = $id_quiz;
        $this->score_quiz = $score_quiz;
    }

    
    /**
     * Get the value of id_user
     */ 
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Get the value of id_quiz
     */ 
    public function getId_quiz()
    {
        return $this->id_quiz;
    }
    
    /**
     * Get the value of score_quiz
     */ 
    public function getScore_quiz()
    {
        return $this->score_quiz;
    }
    
    /**
     * Set the value of score_quiz
     *
     * @return  self
     */ 
    public function setScore_quiz($score_quiz)
    {
        $this->score_quiz = $score_quiz;
        
        return $this;
    }
    public function __toString(){
        return '[Question du quiz : ' . $this->id_user . ', ' . $this->id_quiz . ', ' . $this->score_quiz . ']';
    }
}