<?php

namespace BMS\Model\Amnese;

class PersonalData
{
    public string $name;
    public string $birthDate;
    public int $age;
    public string $nationality;
    public string $nif;

    public function __construct(string $name, string $birthDate, int $age, string $nationality, string $nif)
    {
        $this->name = $name;
        $this->birthDate = $birthDate;
        $this->age = $age;
        $this->nationality = $nationality;
        $this->nif = $nif;
    }

    public function getPersonalData()
    {
        return [
            $this->name,
            $this->birthDate,
            $this->age,
            $this->nationality,
            $this->nif,
        ];
    }
}
