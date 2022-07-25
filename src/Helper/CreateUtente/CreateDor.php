<?php

namespace BMS\Helper\CreateUtente;

use BMS\Helper\Interfaces\CreateUtenteInterface;
use BMS\Helper\Traits\GetSpreasheetMapTrait;
use BMS\Helper\Traits\ValidateDataFormTrait;
use BMS\Infrastructure\Repository\UtenteDorRepository;
use BMS\Infrastructure\Repository\UtenteRepository;
use BMS\Model\Dor\Dor;

class CreateDor implements CreateUtenteInterface
{
    use ValidateDataFormTrait;
    use GetSpreasheetMapTrait;

    public function create(array $post, int $id): int
    {
        $path = 'mapDor';
        $data = $this->getMap($path);
        $dataValidated = $this->validateData($data, $post);

        $dor = new Dor($dataValidated);

        $utenteRepository = new UtenteRepository();
        $spreadsheetId = $utenteRepository->findUtente($id);
        $dorRepository = new UtenteDorRepository();
        $dorRepository->updateData($dor, $spreadsheetId);

        return $id;
    }
}