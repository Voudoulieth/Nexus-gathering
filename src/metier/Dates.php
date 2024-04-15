<?php
declare(strict_types=1);
namespace Nexus_gathering\src\metier;

use DateTime;

class Dates {
    private int          $id_date;
    private DateTime     $ddate;
    private string       $hdate;

    //TODO VOIR DATE ET TIME EN PHP

    public function __construct(int $id_date, datetime $ddate, string $hdate) {
        $this->id_date = $id_date;
        $this->ddate   = $ddate;
        $this->hdate   = $hdate;
    }

    /**
     * Get the value of id_date
     *
     * @return int
     */
    public function getIdDate(): int
    {
        return $this->id_date;
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
        return '[Date : '. $this->id_date . ', ' .$this->ddate->format('Y-m-d') . ', Time : ' . $this->hdate . ']';
    }

}