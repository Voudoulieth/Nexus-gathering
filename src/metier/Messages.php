<?php
declare(strict_types=1);
namespace Nexus_gathering\src\metier;


class Messages {
    private int     $id_message;
    private string  $contenu_mess;
    private bool    $modif;
    private int     $id_exped;
    private int     $id_desti;
    private int     $date_message_id;
    // CHECK (id_exped != id_desti)

    public function __construct(int $id_message, string $contenu_mess, bool $modif, int $id_exped, int $id_desti, int $date_message_id) {
        $this->id_message       = $id_message;
        $this->contenu_mess     = $contenu_mess;
        $this->modif            = $modif;
        $this->id_exped         = $id_exped;
        $this->id_desti         = $id_desti;
        $this->date_message_id  = $date_message_id;
    }

    /**
     * Get the value of id_message
     *
     * @return int
     */
    public function getIdMessage(): int
    {
        return $this->id_message;
    }    
    /**
     * Get the value of contenu_mess
     *
     * @return string
     */
    public function getContenuMess(): string
    {
        return $this->contenu_mess;
    }

    /**
     * Set the value of contenu_mess
     *
     * @param string $contenu_mess
     *
     * @return self
     */
    public function setContenuMess(string $contenu_mess): self
    {
        $this->contenu_mess = $contenu_mess;
        
        return $this;
    }
    
    /**
     * Get the value of modif
     *
     * @return bool
     */
    public function getModif(): bool
    {
        return $this->modif;
    }
    
    /**
     * Set the value of modif
     *
     * @param bool $modif
     *
     * @return self
     */
    public function setModif(bool $modif): self
    {
        $this->modif = $modif;
        
        return $this;
    }
    
    /**
     * Get the value of id_exped
     *
     * @return int
     */
    public function getIdExped(): int
    {
        return $this->id_exped;
    }
    
    /**
     * Get the value of id_desti
     *
     * @return int
     */
    public function getIdDesti(): int
    {
        return $this->id_desti;
    }
    
    /**
     * Get the value of date_message_id
     *
     * @return int
     */
    public function getDateMessageId(): int
    {
        return $this->date_message_id;
    }
    

    public function __toString(){
        return '[Message : ' . $this->id_message . ', ' . $this->contenu_mess . ', ' . $this->modif . ', ' . $this->id_exped . ', ' . $this->id_desti . ', ' . $this->date_message_id . ']';
    }

}