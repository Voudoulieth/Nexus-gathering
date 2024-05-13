<?php
namespace Nexus_gathering\metier;

class Conversation{
    public function __construct( private int $id_user, private string $nom_user, private ?string $avatar, private string $last_message_date)
    {
    }

    /**
     * Get the value of id_user
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * Get the value of nom_user
     */
    public function getNomUser()
    {
        return $this->nom_user;
    }

        /**
     * Get the value of avatar
     */
    public function getAvatar()
    {
        return $this->avatar = $avatar ?? '/assets/Icone/user-solid blanc.svg';
    }

    /**
     * Get the value of last_message_date
     */
    public function getLastMessageDate()
    {
        return $this->last_message_date;
    }

}