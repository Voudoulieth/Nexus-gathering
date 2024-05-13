<?php
namespace Nexus_gathering\metier;

class DTOUser{
    public function __construct( private int $id, private string $nom, private string $avatar, private RoleUtilisateur $role)
    {
    }

    /**
     * Get the value of role
     *
     * @return RoleUtilisateur
     */
    public function getRole(): RoleUtilisateur
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @param RoleUtilisateur $role
     *
     * @return self
     */
    public function setRole(RoleUtilisateur $role): self
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     */
    public function setNom($nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of avatar
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set the value of avatar
     */
    public function setAvatar($avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }
}