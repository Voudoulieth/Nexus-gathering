<?php
declare(strict_types=1);
// namespace restoV5b\metier;

//TODO voir pour add CONSTRAINT chk_mult CHECK (multi IN (0, 1)),    
    //FOREIGN KEY (id_ed) REFERENCES editeur(id_ed),
    //foreign key (id_user) REFERENCES utilisateur(id_user),
    //foreign key (id_stu) REFERENCES studio(id_stu)

class Jeu {
    private int     $id_jeu;
    private String  $nom_jeu;
    private String  $resum_jeu;
    private String  $img_jeu;
    private bool    $multi;

    public function __construct($id_jeu, $nom_jeu, $resum_jeu, $img_jeu, $multi) {
        $this->id_jeu       = $id_jeu;
        $this->nom_jeu	    = $nom_jeu;
        $this->resum_jeu	= $resum_jeu;
        $this->img_jeu	    = $img_jeu;
        $this->multi	    = $multi;
    }

    public function getId_jeu(): int {
        return $this->id_jeu;
    }
    public function setId_jeu(int $id_jeu) {
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
        $this->multi = $multi;
    }
    public function __toString() {
        return '[Categorie : '.$this->id_jeu . ',' . $this->nom_jeu .']';
    }
}
