<?php

namespace BMS\Helper\CreateUtente;

use BMS\Helper\Interfaces\CreateUtenteInterface;
use BMS\Helper\Traits\GetSpreasheetMapTrait;
use BMS\Helper\Traits\ValidateDataFormTrait;
use BMS\Infrastructure\Repository\UtenteDoencasRepository;
use BMS\Infrastructure\Repository\UtenteRepository;
use BMS\Model\Doencas\Doencas;

class CreateDoencas implements CreateUtenteInterface
{
    use ValidateDataFormTrait;
    use GetSpreasheetMapTrait;

    public function create(array $post, int $id): int
    {
        $path = 'mapDoencas';
        $data = $this->getMap($path);
        $dataValidated = $this->validateData($data, $post);

        $doencas = new Doencas($dataValidated);

        $utenteRepository = new UtenteRepository();
        $spreadsheetId = $utenteRepository->findUtente($id);

        $doencasRepository = new UtenteDoencasRepository();
        $doencasRepository->updateData($doencas, $spreadsheetId);

        return $id;
    }
}