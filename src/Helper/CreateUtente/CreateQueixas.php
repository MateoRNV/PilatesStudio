<?php

namespace BMS\Helper\CreateUtente;

use BMS\Helper\Interfaces\CreateUtenteInterface;
use BMS\Helper\Traits\GetSpreasheetMapTrait;
use BMS\Helper\Traits\ValidateDataFormTrait;
use BMS\Infrastructure\Repository\UtenteQueixasRepository;
use BMS\Infrastructure\Repository\UtenteRepository;
use BMS\Model\Queixas\Queixas;

class CreateQueixas implements CreateUtenteInterface
{
    use ValidateDataFormTrait;
    use GetSpreasheetMapTrait;

    /**
     * @param array $post
     * @param int $id
     * @return int ID Utente
     */
    public function create(array $post, mixed $id): int
    {
        var_dump($id);
        $path = 'mapQueixas';
        $data = $this->getMap($path);
        $dataValidated = $this->validateData($data, $post);

        $queixas = new Queixas($dataValidated);
        var_dump($queixas);

        $utenteRepository = new UtenteRepository();
        $spreadsheet = $utenteRepository->findUtente($id);
        var_dump($spreadsheet);
        $queixasRepository = new UtenteQueixasRepository();
        $queixasRepository->updateData($queixas, $spreadsheet);

        return $id;
    }
}