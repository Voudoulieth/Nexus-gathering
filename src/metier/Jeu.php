<?php
declare(strict_types=1);
namespace Nexus_gathering\src\dao;

use Nexus_gathering\src\metier\Editeur;
use Nexus_gathering\src\metier\Studio;
use Nexus_gathering\src\metier\User;

class Jeu {
    private int     $id_jeu;
    private String  $nom_jeu;
    private String  $resum_jeu;
    private String  $img_jeu;
    private bool    $multi;
    private int     $id_ed;
    private int     $id_user;
    private int     $id_stu;

    public function __construct(int $id_jeu, string $nom_jeu, string $resum_jeu, string $img_jeu, bool $multi, int $id_ed, int $id_user, int $id_stu) {
        $this->id_jeu       = $id_jeu;
        $this->nom_jeu	    = $nom_jeu;
        $this->resum_jeu	= $resum_jeu;
        $this->img_jeu	    = $img_jeu;
        $this->multi	    = $multi;
        $this->id_ed        = $id_ed;
        $this->id_user      = $id_user;
        $this->id_stu       = $id_stu;
    }

    public function getId_jeu(): int {
        return $this->id_jeu;
    }
    private function setId_jeu(int $id_jeu) {
        $this->id_jeu = $id_jeu;
    }
    public function getNom_jeu(): String {
        return $this->nom_jeu;
    }
    public function setNom_jeu(String $nom_jeu) {
        $this->nom_jeu = $nom_jeu;
    }
    public function getResum_jeu(): String {
        return $this->resum_jeu;
    }
    public function setResum_jeu(String $resum_jeu) {
        $this->resum_jeu = $resum_jeu;
    }
    public function getImg_jeu(): String {
        return $this->img_jeu;
    }
    public function setImg_jeu(String $img_jeu) {
        $this->img_jeu = $img_jeu;
    }
    public function getMulti(): bool {
        return $this->multi;
    }
    public function setMulti(bool $multi) {
        if ($multi !== 0 && $multi !== 1) {
            throw new \InvalidArgumentException('La valeur de multi doit être soit 0 soit 1.');
        }
        $this->multi = $multi;
    }

    public function getIdEditeur(): int {
        return $this->id_ed;
    }

    public function setIdEditeur(int $id_ed) {
        $this->id_ed = $id_ed;
    }
    public function getIdUser(): int {
        return $this->id_user;
    }

    public function setIdUser(int $id_user) {
        $this->id_user = $id_user;
    }
    public function getIdStudio(): int {
        return $this->id_stu;
    }

    public function setIdStudio(int $id_stu) {
        $this->id_stu = $id_stu;
    }

    public function __toString() {
        return '[Categorie : '.$this->id_jeu . ',' . $this->nom_jeu .']';
    }
}
