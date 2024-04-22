<?php
declare(strict_types=1);
namespace Nexus_gathering\metier;

class Reponse {

    private int      $id_reponse;
    private int      $id_question;
    private string   $reponse_quiz;
    private bool     $reponse_vraie_quiz;

    public function __construct(int $id_reponse, int $id_question, string $reponse_quiz, bool $reponse_vraie_quiz) {
        $this->id_reponse         = $id_reponse;
        $this->id_question        = $id_question;
        $this->reponse_quiz       = $reponse_quiz;
        $this->reponse_vraie_quiz = $reponse_vraie_quiz;
    }

    
    /**
     * Get the value of id_reponse
     */ 
    public function getId_reponse()
    {
        return $this->id_reponse;
    }
    
    /**
     * Get the value of id_question
     */ 
    public function getId_question()
    {
        return $this->id_question;
    }
    
    /**
     * Get the value of reponse_quiz
     */ 
    public function getReponse_quiz()
    {
        return $this->reponse_quiz;
    }

    /**
     * Set the value of reponse_quiz
     *
     * @return  self
     */ 
    public function setReponse_quiz($reponse_quiz)
    {
        $this->reponse_quiz = $reponse_quiz;

        return $this;
    }
    
    /**
     * Get the value of reponse_vraie_quiz
     */ 
    public function getReponse_vraie_quiz()
    {
        return $this->reponse_vraie_quiz;
    }

    /**
     * Set the value of reponse_vraie_quiz
     *
     * @return  self
     */ 
    public function setReponse_vraie_quiz($reponse_vraie_quiz)
    {
        $this->reponse_vraie_quiz = $reponse_vraie_quiz;
        
        return $this;
    }

    
    public function __toString(){
        return '[réponse à la question : ' . $this->id_reponse . ', ' . $this->id_question . ', ' . $this->reponse_quiz . ', ' .  $this->reponse_vraie_quiz . ']';
    }
}