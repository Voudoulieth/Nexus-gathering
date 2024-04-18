<?php
declare(strict_types=1);
namespace Nexus_gathering\metier;



class Utilisateur extends CreationUser
{
    private RoleUtilisateur $role;
    
    public function __construct(int $id_user, string $nom_user, string $password, string $avatar, string $mail, int $age, RoleUtilisateur $role)
    {
        parent::__construct($id_user, $nom_user, $password, $avatar, $mail, $age);
        $this->role = $role;
    }


    // on définit les getters

    public function getRole(): RoleUtilisateur
    {
        return $this->role;
    }

    // on définit les setters

    public function setRole(RoleUtilisateur $role):self
    {
        $this->role = $role;

        return $this;
    }

    public function __toString()
    {
        return parent::__toString() . '-Role' . $this->role;
    }

}


    

?>