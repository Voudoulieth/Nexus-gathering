<?php
declare(strict_types=1);
namespace Nexus_gathering\metier;

class Jeu {
    private int     $id_jeu;
    private String  $nom_jeu;
    private String  $resum_jeu;
    private String  $img_jeu;
    private bool    $multi;
    private int     $id_ed;
    private int     $id_user;
    private int     $id_stu;
    private string  $date_sortie;
    private string  $style;
    private string  $date_debut_dev;
    private string $consoles;
    private bool $crossPlatform;
    private string $format; // Added this line

    public function __construct(int $id_jeu, string $nom_jeu, bool $multi, string $resum_jeu = '', string $img_jeu = '', int $id_ed = 0, int $id_user = 0, int $id_stu = 0, string $date_sortie = '', string $style = '', string $date_debut_dev = '', string $consoles = '', bool $crossPlatform = false, string $format = '') { // Added $format parameter
        $this->id_jeu       = $id_jeu;
        $this->nom_jeu      = $nom_jeu;
        $this->resum_jeu    = $resum_jeu;
        $this->img_jeu      = $img_jeu;
        $this->multi        = $multi;
        $this->id_ed        = $id_ed;
        $this->id_user      = $id_user;
        $this->id_stu       = $id_stu;
        $this->date_sortie  = $date_sortie;
        $this->style       = $style;
        $this->date_debut_dev = $date_debut_dev;
        $this->consoles = $consoles;
        $this->crossPlatform = $crossPlatform;
        $this->format = $format; // Added this line
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
    public function setMulti(bool $multi): void
    {
        if (!is_bool($multi)) {
            throw new \InvalidArgumentException('La valeur de $multi doit être un booléen.');
        }
        $this->multi = $multi;
    }

    public function getEditeur(): int {
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
    public function getStudio(): int {
        return $this->id_stu;
    }

    public function setIdStudio(int $id_stu) {
        $this->id_stu = $id_stu;
    }

    public function getDateSortie(): string {
        return $this->date_sortie;
    }

    public function setDateSortie(string $date_sortie): void {
        $this->date_sortie = $date_sortie;
    }

    public function getStyle(): string {
        return $this->style;
    }

    public function setStyle(string $style): void {
        $this->style = $style;
    }

    public function getDateDebutDev(): string {
        return $this->date_debut_dev; 
    }

    public function getConsoles(): string {
        return $this->consoles;
    }

    public function getCrossPlatform(): bool {
        return $this->crossPlatform;
    }

    public function getFormat(): string {
        return $this->format;
    }

    public function __toString() {
        return '[Categorie : '.$this->id_jeu . ',' . $this->nom_jeu .']';
    }
}