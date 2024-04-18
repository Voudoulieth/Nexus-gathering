<?php
declare(strict_types=1);

namespace Nexus_gathering\metier;

class Avoir{
    private int $id_niveau;
    private int $id_user;

    public function __construct(int $id_niveau, int $id_user){
        $this->id_niveau      = $id_niveau;
        $this->id_user       = $id_user;
    }


    // on définit les getters

    public function getIdNiveau():int
    {
        return $this->id_niveau;
    }

    public function getIdUser(): int
    {
        return $this->id_user;
    }


    //on définit les setters

    public function setIdNiveau(int $id_niveau):void
    {
        $this->id_niveau = $id_niveau;

        
    }
    public function __toString(){
        return '[Avoir : ' . $this->id_niveau . ', ' . $this->id_user . ']';
    }


}



?>
