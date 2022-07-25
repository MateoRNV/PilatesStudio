<?php

namespace BMS\Helper\CreateUtente;

use BMS\Helper\Interfaces\CreateUtenteInterface;
use BMS\Helper\Traits\GetSpreasheetMapTrait;
use BMS\Helper\Traits\ValidateDataFormTrait;
use BMS\Infrastructure\Repository\UtenteAmnesePorAparelhosRepository;
use BMS\Infrastructure\Repository\UtenteRepository;
use BMS\Model\AmnesePorAparelhos\AmnesePorAparelhos;

class CreateAparelhos implements CreateUtenteInterface
{
    use ValidateDataFormTrait;
    use GetSpreasheetMapTrait;

    public function create(array $post, int $id): int
    {
        $path = 'mapAparelhos';
        $data = $this->getMap($path);
        $dataValidated = $this->validateData($data, $post);

        $amneseAparelhos = new AmnesePorAparelhos($dataValidated);

        $utenteRepository = new UtenteRepository();
        $spreadsheetId = $utenteRepository->findUtente($id);

        $amneseAparelhosRepository = new UtenteAmnesePorAparelhosRepository();
        $amneseAparelhosRepository->updateData($amneseAparelhos, $spreadsheetId);

        return $id;
    }
}