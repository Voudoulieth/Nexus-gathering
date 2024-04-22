<?php
declare(strict_types=1);
namespace Nexus_gathering\metier;

class Categorie {

    private int         $id_cat_quiz;
    private string      $nom_cat_quiz;

    public function __construct(int $id_cat_quiz, string $nom_cat_quiz) {
        $this->id_cat_quiz    = $id_cat_quiz;
        $this->nom_cat_quiz   = $nom_cat_quiz;
    }

    
    /**
     * Get the value of id_cat_quiz
     */ 
    public function getId_cat_quiz()
    {
        return $this->id_cat_quiz;
    }
    
    /**
     * Get the value of nom_cat_quiz
     */ 
    public function getNom_cat_quiz()
    {
        return $this->nom_cat_quiz;
    }
    
    /**
     * Set the value of nom_cat_quiz
     *
     * @return  self
     */ 
    private function setNom_cat_quiz($nom_cat_quiz)
    {
        $this->nom_cat_quiz = $nom_cat_quiz;
        
        return $this;
    }
    public function __toString(){
        return '[Catégorie de quiz : ' . $this->id_cat_quiz . ', ' . $this->nom_cat_quiz . ']';
    }
}