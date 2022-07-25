<?php

namespace BMS\Helper\Interfaces;

interface CreateUtenteInterface
{
    public function create(array $post, int $id): int;
}