<?php
declare(strict_types=1);
namespace Nexus_gathering\dao;

class Plateforme {
    private int     $id_plat;
    private String  $nom_plat;

    public function __construct(int $id_plat, string $nom_plat) {
        $this->id_plat       = $id_plat;
        $this->nom_plat  = $nom_plat;
    }

    public function getId_plat(): int {
        return $this->id_plat;
    }
    private function setId_plat(int $id_plat) {
        $this->id_plat = $id_plat;
    }
    public function getNom_plat(): String {
        return $this->nom_plat;
    }
    public function setNom_plat(String $nom_plat) {
        $this->nom_plat = $nom_plat;
    }
    public function __toString() {
        return '[Categorie : '.$this->id_plat . ',' . $this->nom_plat .']';
    }
}