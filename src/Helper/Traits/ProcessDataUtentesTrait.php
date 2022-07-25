<?php

namespace BMS\Helper\Traits;

trait ProcessDataUtentesTrait
{
    use GetSpreasheetMapTrait;

    public function processData(array $data, string $path): array
    {
        $map = $this->getMap($path);

        $dataProcessed = [];
        foreach ($data as $key => $value) {
            if (array_key_exists($key, $map)) {
                $valueOnMap = $map[$key];
                $dataProcessed[$valueOnMap] = $value;
            }
        }

        return $dataProcessed;
    }
}