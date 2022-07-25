<?php

namespace BMS\Helper\CreateUtente;

use BMS\Helper\Interfaces\CreateUtenteInterface;
use BMS\Helper\Traits\GetSpreasheetMapTrait;
use BMS\Helper\Traits\ValidateDataFormTrait;
use BMS\Infrastructure\Repository\UtenteClassesDorRepository;
use BMS\Infrastructure\Repository\UtenteRepository;
use BMS\Model\ClassesDeDor\ClassesDor;

class CreateClassesDor implements CreateUtenteInterface
{
    use ValidateDataFormTrait;
    use GetSpreasheetMapTrait;

    public function create(array $post, int $id): int
    {
        $path = 'mapClassesDor';
        $data = $this->getMap($path);
        $dataValidated = $this->validateData($data, $post);

        $classesDor = new ClassesDor($dataValidated);

        $utenteRepository = new UtenteRepository();
        $spreadsheetId = $utenteRepository->findUtente($id);
        $classesDorRepository = new UtenteClassesDorRepository();
        $classesDorRepository->updateData($classesDor, $spreadsheetId);

        return $id;
    }
}