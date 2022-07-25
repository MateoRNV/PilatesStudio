<?php

namespace BMS\Model\AmnesePorAparelhos;

class AmnesePorAparelhos
{
    private array $aparelhos;

    public function __construct(array $aparelhos)
    {
        $this->aparelhos = $aparelhos;
    }

    public function getAparelhos()
    {
        return $this->aparelhos;
    }
}