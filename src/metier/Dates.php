<?php
declare(strict_types=1);
// namespace restoV5b\metier;

class Dates {
    private date     $ddate;
    private time     $hdate;

    //TODO VOIR DATE ET TIME EN PHP

    public function __construct($ddate, $hdate) {
        $this->ddate       = $ddate;
        $this->hdate  = $hdate;
    }

    public function getDdate(): date {
        return $this->ddate;
    }
    public function setDdate(date $ddate) {
        $this->ddate = $ddate;
    }
    public function getHdate(): time {
        return $this->hdate;
    }
    public function setHdate(time $hdate) {
        $this->hdate = $hdate;
    }
    public function __toString() {
        return '[Categorie : '.$this->ddate . ',' . $this->hdate .']';
    }
}