<?php
declare(strict_types=1);
namespace Nexus_gathering\metier;

class Editeur {
    private int     $id_ed;
    private string  $nom_ed;

    public function __construct(int $id_ed, string $nom_ed) {
        $this->id_ed   = $id_ed;
        $this->nom_ed  = $nom_ed;
    }

    public function getId_ed(): int {
        return $this->id_ed;
    }
    public function getNom_ed(): string {
        return $this->nom_ed;
    }
    public function __toString() {
        return '[Editeur : ' . $this->id_ed . ', ' . $this->nom_ed . ']';
    }
}