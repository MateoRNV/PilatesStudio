<?php

namespace BMS\Helper\Traits;

trait GetSpreasheetMapTrait
{
    /**
     * @param string $path
     * @return mixed MAP
     */
    public function getMap(string $path): mixed
    {
        return require_once __DIR__ . '/../../../data/' . $path . '.php';
    }
}