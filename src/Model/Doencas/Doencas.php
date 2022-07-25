<?php

namespace BMS\Model\Doencas;

class Doencas
{
    private array $doencas;

    public function __construct(array $doencas)
    {
        $this->doencas = $doencas;
    }

    public function getDoencas()
    {
        return $this->doencas;
    }
}