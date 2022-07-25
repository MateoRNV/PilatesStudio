<?php

namespace BMS\Model;

class User
{
    private string $email;
    private string $password;

    public function __construct()
    {
        $this->email = $_ENV['USER_EMAIL'];
        $this->password = $_ENV['USER_PASSWORD'];
    }

    public function email()
    {
        return $this->email;
    }

    public function password()
    {
        return $this->password;
    }
}