<?php

namespace BMS\Model\Amnese;

class Contact
{
    public string $email;
    public string $phone;
    public string $address;

    public function __construct(string $email, string $phone, string $address)
    {
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
    }

    public function getContact()
    {
        return [
            $this->email,
            $this->phone,
            $this->address,
        ];
    }
}
