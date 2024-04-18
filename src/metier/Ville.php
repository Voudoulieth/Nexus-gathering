<?php

declare(strict_types=1);
namespace Nexus_gathering\metier;

class Ville{
    private int $id_ville;
    private string $nom_ville;

    public function __construct(int $id_ville, string $nom_ville)
    {
        $this->id_ville = $id_ville;
        $this->nom_ville = $nom_ville;
    }

    // on définit les getters

    public function getIdVille():int
    {
        return $this->id_ville;
    }

    public function getNomVille():string
    {
        return $this->nom_ville;
    }

    // on définit les setters

    public function setNomVille(string $nom_ville)
    {
        $this->nom_ville = $nom_ville;
    }

    public function __toString()
    {
        return '[Ville : ' . $this->id_ville . ', ' . $this->nom_ville . ']';
    }
}


?>