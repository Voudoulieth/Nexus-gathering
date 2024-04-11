<?php
declare(strict_types=1);

class RechercheRapide {
    private int $id_session;
    private int $id_user;
    private int $id_jeu;

//     -- CHECK (fin_session IS NULL OR fin_session >= deb_session),
//     -- CHECK (fin_session IS NULL OR TIMESTAMPDIFF(HOUR, deb_session, fin_session) <= 6)
// ); -- date

    public function __construct(int $id_session, int $id_user, int $id_jeu){
        $this->id_session   = $id_session;
        $this->id_user      = $id_user;
        $this->id_jeu       = $id_jeu;
    }

    /**
     * Get the value of id_session
     *
     * @return int
     */
    public function getIdSession(): int
    {
        return $this->id_session;
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
        return '[Recherche rapide : ' . $this->id_session . ', ' . $this->id_user . ', ' . $this->id_jeu . ']';
    }
}