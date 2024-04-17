<?php
declare(strict_types=1);

namespace Nexus_gathering\metier;


class RoleUtilisateur{

    private int $id_role;
    private string $nom_role;

    
    public function __construct(int $id_role, string $nom_role)
    {
        $this->id_role = $id_role;
        $this->nom_role = $nom_role;
    }


    // on définit les getter


    public function getIdRole():int
    {
        return $this->id_role;
    }

    public function getNomRole():string
    {
        return $this->nom_role;

    }

    // on définit les setter

    public function setNomRole(string $nom_role):self
    {
        $this->nom_role = $nom_role;

        return $this;
    }


    public function __toString()
    {
        return '[RoleUtilisateur :'.$this->id_role . ','. $this->nom_role . ']';
    }
}



?>