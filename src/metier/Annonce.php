<?php

declare(strict_types=1);
namespace Nexus_gathering\metier;


class Annonce
{
    private int         $id_annonce;
    private string      $nom_annonce;
    private int         $nb_user;
    private string      $desc_annonce;
    private \datetime   $date_annonce;
    private int         $id_user;
    private int         $id_jeu;

    public function __construct(int $id_annonce, string $nom_annonce, int $nb_user, string $desc_annonce, \datetime $date_annonce, int $id_user, int $id_jeu)
    {
        $this->id_annonce   = $id_annonce;
        $this->nom_annonce  = $nom_annonce;
        $this->nb_user      = $nb_user;
        $this->desc_annonce = $desc_annonce;
        $this->date_annonce = $date_annonce;
        $this->id_user      = $id_user;
        $this->id_jeu       = $id_jeu;
    }


    /**
     * Get the value of id_annonce
     *
     * @return int
     */
    public function getIdAnnonce(): int
    {
        return $this->id_annonce;
    }

    /**
     * Get the value of nom_annonce
     *
     * @return string
     */
    public function getNomAnnonce(): string
    {
        return $this->nom_annonce;
    }

    /**
     * Set the value of nom_annonce
     *
     * @param string $nom_annonce
     *
     * @return self
     */
    public function setNomAnnonce(string $nom_annonce): self
    {
        $this->nom_annonce = $nom_annonce;

        return $this;
    }

    /**
     * Get the value of nb_user
     *
     * @return int
     */
    public function getNbUser(): int
    {
        return $this->nb_user;
    }

    /**
     * Set the value of nb_user
     *
     * @param int $nb_user
     *
     * @return self
     */
    public function setNbUser(int $nb_user): self
    {
        $this->nb_user = $nb_user;

        return $this;
    }

    /**
     * Get the value of desc_annonce
     *
     * @return string
     */
    public function getDescAnnonce(): string
    {
        return $this->desc_annonce;
    }

    /**
     * Set the value of desc_annonce
     *
     * @param string $desc_annonce
     *
     * @return self
     */
    public function setDescAnnonce(string $desc_annonce): self
    {
        $this->desc_annonce = $desc_annonce;

        return $this;
    }

    /**
     * Get the value of id_user
     *
     * @return int
     */
    public function getIdUser(): int
    {
        return $this->id_user;
    }

    /**
     * Get the value of id_jeu
     *
     * @return int
     */
    public function getIdJeu(): int
    {
        return $this->id_jeu;
    }
    
    /**
     * Get the value of date_annonce
     *
     * @return \datetime
     */
    public function getDateAnnonce(): \datetime
    {
        return $this->date_annonce;
    }

    public function __toString()
    {
        return '[Annonce : ' . $this->id_annonce . ', ' . $this->nom_annonce . ', ' . $this->nb_user . ', ' . $this->desc_annonce . ', ' . $this->date_annonce . ', ' . $this->id_user . ', ' . $this->id_jeu . ']';
    }

}
