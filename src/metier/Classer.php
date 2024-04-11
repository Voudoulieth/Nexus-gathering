<?php
declare(strict_types=1);

class Classer {
    private string  $rank_user;
    private int $id_user;
    private int $id_jeu;

    public function __construct(string $rank_user, int $id_user, int $id_jeu){
        $this->rank_user   = $rank_user;
        $this->id_user      = $id_user;
        $this->id_jeu       = $id_jeu;
    }

    /**
     * Get the value of rank_user
     *
     * @return string
     */
    public function getRankUser(): string
    {
        return $this->rank_user;
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

    public function __toString(){
        return '[Classement : ' . $this->rank_user . ', ' . $this->id_user . ', ' . $this->id_jeu . ']';
    }
}