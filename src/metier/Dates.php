<?php
declare(strict_types=1);
// namespace restoV5b\metier;

class Dates {
    private datetime     $ddate;
    private string       $hdate;

    //TODO VOIR DATE ET TIME EN PHP

    public function __construct($ddate, $hdate) {
        $this->ddate  = $ddate;
        $this->hdate  = $hdate;
    }

    public function getDdate(): datetime {
        return $this->ddate;
    }
    public function setDdate(datetime $ddate) {
        $this->ddate = $ddate;
    }
    public function getHdate(): string {
        return $this->hdate;
    }
    public function setHdate(string $hdate) {
        $this->hdate = $hdate;
    }
    public function __toString(): string {
        return '[Date : '.$this->ddate->format('Y-m-d') . ', Time : ' . $this->hdate . ']';
    }
}