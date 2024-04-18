<?php
declare(strict_types=1);
namespace Nexus_gathering\metier;

class Studio {
    private int     $id_stu;
    private String  $nom_stu;
    private int     $id_ed;

    public function __construct(int $id_stu, string $nom_stu, int $id_ed) {
        $this->id_stu   = $id_stu;
        $this->nom_stu  = $nom_stu;
        $this->id_ed    = $id_ed;
    }

    public function getId_stu(): int {
        return $this->id_stu;
    }
    private function setId_stu(int $id_stu) {
        $this->id_stu = $id_stu;
    }
    public function getNom_stu(): String {
        return $this->nom_stu;
    }
    public function setNom_stu(String $nom_stu) {
        $this->nom_stu = $nom_stu;
    }

    public function getId_ed(): int {
        return $this->id_ed;
    }

    public function setId_ed(int $id_ed) {
        $this->id_ed = $id_ed;
    }

    public function __toString() {
        return '[Categorie : '.$this->id_stu . ',' . $this->nom_stu .']';
    }
}