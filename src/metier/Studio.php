<?php
declare(strict_types=1);
// namespace restoV5b\metier;

//TODO voir pour ajouter foreign key(id_ed) references editeur(id_ed)

class Studio {
    private int     $id_stu;
    private String  $nom_stu;

    public function __construct($id_stu, $nom_stu) {
        $this->id_stu   = $id_stu;
        $this->nom_stu  = $nom_stu;
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