<?php
declare(strict_types=1);

class Rejoindre {

    private int $id_user;
    private int $id_jeu;

    public function __construct(int $id_user, int $id_jeu){
        $this->id_user      = $id_user;
        $this->id_jeu       = $id_jeu;
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
     * Set the value of id_jeu
     *
     * @param int $id_jeu
     *
     * @return self
     */
    public function setIdJeu(int $id_jeu): self
    {
        $this->id_jeu = $id_jeu;

        return $this;
    }
    public function __toString(){
        return '[Classement : ' . $this->id_user . ', ' . $this->id_jeu . ']';
    }
}