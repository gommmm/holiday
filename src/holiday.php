<?php

namespace Main;

class Holiday {
    private $today;
    private $date;
    private $diff;

    public function __construct()
    {
        $this->today = new \DateTime();
    }

    public function setDate(\DateTime $date) 
    {
        $this->date = $date;
        $this->calculateDiff();
    }

    private function calculateDiff() {
        $this->diff = $this->date->diff($this->today);
    }

    public function checkUpdateDate() : bool
    {
        $diff = $this->diff;

        if ($diff->y === 0 && $diff->m > 0 && $diff->d === 0) {
            return true;
        }

        if ($diff->y > 0 && $diff->m === 0 && $diff->d === 0) {
            return true;
        }

        return false;
    }

    public function getCount() : int
    {
        $diff = $this->diff;

        if ($diff->y === 0) {
            return $diff->m;
        }

        $count = 15;
        
        if ($diff->y >= 3) {
            $count += floor(($diff->y - 1) / 2);
        }

        if ($count > 25) {
            $count = 25;
        }

        return $count;
    }
}
