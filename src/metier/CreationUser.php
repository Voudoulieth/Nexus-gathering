<?php

declare(strict_types=1);
namespace Nexus_gathering\metier;

class CreationUser
{

    private int $id_user;
    private string $nom_user;
    private string $password;
    private string $avatar;
    private string $mail;
    private int $age;
    

    public function __construct(int $id_user, string $nom_user, string $password, string $avatar, string $mail, int $age)
    {
        $this->id_user = $id_user;
        $this->nom_user = $nom_user;
        $this->password = $password;
        $this->avatar = $avatar;
        $this->mail = $mail;
        $this->age = $age;
    }

    //on met en place les getteurs

    public function getIdUser():int
    {
        return $this->id_user;
    }

    public function getNomUser():string
    {
        return $this->nom_user;
    }

    public function getPassword():string
    {
        return $this->password;
    }

    public function getAvatar():string
    {
        return $this->avatar;
    }

    public function getMail():string
    {
        return $this->mail;
    }

    public function getAge():int
    {
        return $this->age;
    }

    


    // on met en place les setters souhaités


    public function setNomUser(string $nom_user):self
    {
        $this->nom_user = $nom_user;

        return $this;
    }

    public function setPassword(string $password):self
    {
        $this->password = $password;

        return $this;
    }

    public function setAvatar(string $avatar):self
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function setMail(string $mail):self
    {
        $this->mail = $mail;

        return $this;
    }

    public function setAge(int $age):self
    {
        $this->age = $age;

        return $this;
    }

    public function __toString()
    {
        return '[Utilisateur : ' . $this->id_user . ', ' . $this->nom_user . ', ' . $this->password . ', ' . $this->avatar . ', ' . $this->mail . ', ' . $this->age . ']';
    }


}


?>