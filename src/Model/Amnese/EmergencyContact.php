<?php

namespace BMS\Model\Amnese;

class EmergencyContact
{
    public string $name;
    public string $phone;

    public function __construct(string $name, string $phone)
    {
        $this->name = $name;
        $this->phone = $phone;
    }

    public function getEmergencyContact()
    {
        return [
            $this->name,
            $this->phone,
        ];
    }
}
