<?php
declare(strict_types=1);
namespace Nexus_gathering\metier;


class RechercheRapide {
    private int $id_session;
    private int $id_user;
    private int $id_jeu;
    private \DateTime $deb_session;
    private ?\DateTime $fin_session;

    public function __construct(int $id_session, int $id_user, int $id_jeu, \DateTime $deb_session, ?\DateTime $fin_session = null) {
        $this->id_session = $id_session;
        $this->id_user = $id_user;
        $this->id_jeu = $id_jeu;
        $this->deb_session = $deb_session;
        $this->fin_session = $fin_session;
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
    /**
     * Get the value of deb_session
     *
     * @return \DateTime
     */
    public function getDebSession(): \DateTime
    {
        return $this->deb_session;
    }

    /**
     * Get the value of fin_session
     *
     * @return ?\DateTime
     */
    public function getFinSession(): ?\DateTime
    {
        return $this->fin_session;
    }

    /**
     * Set the value of fin_session
     *
     * @param ?\DateTime $fin_session
     *
     * @return self
     */
    public function setFinSession(?\DateTime $fin_session): self
    {
        $this->fin_session = $fin_session;

        return $this;
    }

    public function __toString(){
        return '[Recherche rapide : ' . $this->id_session . ', ' . $this->id_user . ', ' . $this->id_jeu . ', ' . $this->deb_session . ', ' . $this->fin_session . ']';
    }

}