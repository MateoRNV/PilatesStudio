<?php

namespace BMS\Helper\Traits;

trait ValidateDataFormTrait
{
    public function validateData(array $data, array $post): array
    {
        $dataValidated = [];
        foreach ($data as $key => $value) {
            if (isset($post[$value])) {
                $dataValidated[$key] = $post[$value];
            }
        }
        return $dataValidated;
    }
}
