<?php
declare(strict_types=1);
namespace Nexus_gathering\dao;

//TODO  voir pour add la contrainte CONSTRAINT chk_format CHECK (form IN ('dématérialisé', 'physique'))

class Formats {
    private int     $id_form;
    private String  $nom_form;

    public function __construct(int $id_form , string $nom_form) {
        $this->id_form   = $id_form ;
        $this->nom_form  = $nom_form;
    }

    public function getId_form (): int {
        return $this->id_form;
    }
    private function setId_form (int $id_form) {
        $this->id_form = $id_form;
    }
    public function getNom_form(): String {
        return $this->nom_form;
    }
    public function setNom_form(String $nom_form) {
        $this->nom_form = $nom_form;
    }
    public function __toString() {
        return '[Categorie : '.$this->id_form . ',' . $this->nom_form .']';
    }
}