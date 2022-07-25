<?php

namespace BMS\Model\Queixas;

class Queixas
{
    private array $queixas;

    public function __construct(array $queixas)
    {
        $this->queixas = $queixas;
    }

    /**
     * @return array
     */
    public function getQueixas(): array
    {
        return $this->queixas;
    }
}