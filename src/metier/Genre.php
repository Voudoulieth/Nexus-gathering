<?php
declare(strict_types=1);
namespace Nexus_gathering\src\dao;

class Genre {
    private int     $id_genre;
    private String  $nom_genre;

    public function __construct(int $id_genre, string $nom_genre) {
        $this->id_genre  = $id_genre;
        $this->nom_genre = $nom_genre;
    }

    public function getId_genre(): int {
        return $this->id_genre;
    }
    private function setId_genre(int $id_genre) {
        $this->id_genre = $id_genre;
    }
    public function getNom_genre(): String {
        return $this->nom_genre;
    }
    public function setNom_genre(String $nom_genre) {
        $this->nom_genre = $nom_genre;
    }
    public function __toString() {
        return '[Categorie : '.$this->id_genre . ',' . $this->nom_genre .']';
    }
}