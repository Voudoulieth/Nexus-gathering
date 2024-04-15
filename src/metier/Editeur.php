<?php
declare(strict_types=1);
namespace Nexus_gathering\src\dao;

class Editeur {
    private int     $id_ed;
    private String  $nom_ed;

    public function __construct(int $id_ed, string $nom_ed) {
        $this->id_ed   = $id_ed;
        $this->nom_ed  = $nom_ed;
    }

    public function getId_ed(): int {
        return $this->id_ed;
    }
    private function setId_ed(int $id_ed) {
        $this->id_ed = $id_ed;
    }
    public function getNom_ed(): String {
        return $this->nom_ed;
    }
    public function setNom_ed(String $nom_ed) {
        $this->nom_ed = $nom_ed;
    }
    public function __toString() {
        return '[Categorie : '.$this->id_ed . ',' . $this->nom_ed .']';
    }
}