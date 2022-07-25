<?php

namespace BMS\Model\Tratamentos;

class TratamentosMedicacao
{
    private array $tratamentos;

    public function __construct(array $tratamentos)
    {
        $this->tratamentos = $tratamentos;
    }

    public function getTratamentos()
    {
        return $this->tratamentos;
    }
}