<?php
declare(strict_types=1);

namespace Nexus_gathering\metier;

class Vivre{
    private int $id_ville;
    private int $id_user;

    public function __construct(int $id_ville, int $id_user){
        $this->id_ville      = $id_ville;
        $this->id_user       = $id_user;
    }


    // on définit les getters

    public function getIdville():int
    {
        return $this->id_ville;
    }

    public function getIdUser(): int
    {
        return $this->id_user;
    }


    //on définit les setters

    public function setIdVille(int $id_ville):void
    {
        $this->id_ville = $id_ville;

        
    }
    public function __toString(){
        return '[Avoir : ' . $this->id_ville . ', ' . $this->id_user . ']';
    }


}



?>
