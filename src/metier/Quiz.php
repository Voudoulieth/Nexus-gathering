<?php
declare(strict_types=1);
namespace Nexus_gathering\metier;

class Quiz {
    private int         $id_quiz;
    private int         $id_cat_quiz;
    private int         $id_user;
    private string      $titre_quiz;
    private string      $photo_quiz;
    private \DateTime   $date_crea_quiz;

    public function __construct(int $id_quiz, string $id_cat_quiz, int $id_user, int $titre_quiz, \DateTime $date_crea_quiz) {
        $this->id_quiz       = $id_quiz;
        $this->id_cat_quiz   = $id_cat_quiz;
        $this->id_user       = $id_user;
        $this->titre_quiz    = $titre_quiz;
        $this->date_quiz     = $date_crea_quiz;
    }

    
    public function getId_quiz()
    {
        return $this->id_quiz;
    }
  
    /**
     * Get the value of id_cat_quiz
     */ 
    public function getId_cat_quiz()
    {
        return $this->id_cat_quiz;
    }
    
    /**
     * Get the value of id_user
     */ 
    public function getId_user()
    {
        return $this->id_user;
    }
    
    /**
     * Get the value of date_quiz
     */ 
    public function getDate_quiz()
    {
        return $this->date_crea_quiz;
    }
    
    /**
     * Set the value of date_quiz
     *
     * @return  self
     */ 
    public function setDate_quiz($date_crea_quiz)
    {
        $this->date_crea_quiz = $date_crea_quiz;
        
        return $this;
    }
    
    /**
     * Get the value of titre_quiz
     */ 
    public function getTitre_quiz()
    {
        return $this->titre_quiz;
    }

    /**
     * Set the value of titre_quiz
     *
     * @return  self
     */ 
    public function setTitre_quiz($titre_quiz)
    {
        $this->titre_quiz = $titre_quiz;

        return $this;
    }
    
    /**
     * Get the value of photo_quiz
     */ 
    public function getPhoto_quiz()
    {
        return $this->photo_quiz;
    }
    
    /**
     * Set the value of photo_quiz
     *
     * @return  self
     */ 
    public function setPhoto_quiz($photo_quiz)
    {
        $this->photo_quiz = $photo_quiz;
        
        return $this;
    }
    public function __toString(){
        return '[Quiz : ' . $this->id_quiz . ', ' . $this->id_cat_quiz . ', ' . $this->id_user . ', ' . $this->titre_quiz . ', ' . $this->date_quiz . ']';
    }
}