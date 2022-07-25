<?php

namespace BMS\Model\Dor;

class Dor
{
    private array $dores;

    public function __construct(array $dores)
    {
        $this->dores = $dores;
    }

    /**
     * @return array
     */
    public function getDores(): array
    {
        return $this->dores;
    }
}