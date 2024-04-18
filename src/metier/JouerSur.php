<?php
declare(strict_types=1);

namespace Nexus_gathering\metier;

class JouerSur{
    private int $id_user;
    private int $id_plat;

    public function __construct(int $id_user, int $id_plat){
        $this->id_user      = $id_user;
        $this->id_plat       = $id_plat;
    }


    // on définit les getters

    public function getIdUser():int
    {
        return $this->id_user;
    }

    public function getIdPlat(): int
    {
        return $this->id_plat;
    }


    //on définit les setters

    public function setIdUser(int $id_user):void
    {
        $this->id_user = $id_user;

        
    }
    public function __toString(){
        return '[Avoir : ' . $this->id_user . ', ' . $this->id_plat . ']';
    }


}



?>
