<?php

namespace BMS\Model\ClassesDeDor;

class ClassesDor
{
    private array $classesDor;

    public function __construct(array $classesDor)
    {
        $this->classesDor = $classesDor;
    }

    /**
     * @return array
     */
    public function getClassesDor(): array
    {
        return $this->classesDor;
    }
}