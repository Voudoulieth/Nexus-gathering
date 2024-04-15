<?php
declare(strict_types=1);
namespace Nexus_gathering\src\dao;

use Nexus_gathering\src\metier\Editeur;

class Studio {
    private int     $id_stu;
    private String  $nom_stu;
    private int     $id_ed;

    public function __construct(int $id_stu, string $nom_stu, Editeur $editeur) {
        $this->id_stu   = $id_stu;
        $this->nom_stu  = $nom_stu;
        $this->id_ed    = $editeur->getId_ed();
    }

    public function getId_stu(): int {
        return $this->id_stu;
    }
    public function setId_stu(int $id_stu) {
        $this->id_stu = $id_stu;
    }
    public function getNom_stu(): String {
        return $this->nom_stu;
    }
    public function setNom_stu(String $nom_stu) {
        $this->nom_stu = $nom_stu;
    }

    public function __toString() {
        return '[Categorie : '.$this->id_stu . ',' . $this->nom_stu .']';
    }
}