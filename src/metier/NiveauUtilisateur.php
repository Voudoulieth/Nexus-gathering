<?php
declare(strict_types=1);

namespace Nexus_gathering\metier;

class NiveauUtilisateur
{
    private int $id_niveau;
    private string $nom_niveau;
    private string $description;

    public function __construct(int $id_niveau, string $nom_niveau, string $description)
    {
        $this->id_niveau = $id_niveau;
        $this->nom_niveau = $nom_niveau;
        $this->description = $description;
    }


    // on définit les getters

    public function getIdNiveau():int
    {
        return $this->id_niveau;
    }

    public function getNomNiveau():string
    {
        return $this->nom_niveau;
    }

    public function getDescription():string
    {
        return $this->description;
    }


    // on définit les setters

    public function setNomNiveau(string $nom_niveau):void
    {
        $this->nom_niveau = $nom_niveau;
    }

    public function setDescription(string $description):void
    {
        $this->description = $description;
    }

    public function __toString()
    {
        return '[NiveauUtilisateur :' . $this->id_niveau . ',' . $this->nom_niveau . ',' . $this->description . ']';
    }
}





?>