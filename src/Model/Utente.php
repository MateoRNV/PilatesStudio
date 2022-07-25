<?php

namespace BMS\Model;

use BMS\Model\Amnese\Amnese;

class Utente
{
    private array $amnese;

    public function __construct(array $amnese)
    {
        $this->amnese = $amnese;
    }

    public function amneseData()
    {
        return $this->amnese;
    }
}
