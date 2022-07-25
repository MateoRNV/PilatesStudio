<?php

namespace BMS\Helper\CreateUtente;

use BMS\Helper\Interfaces\CreateUtenteInterface;
use BMS\Helper\Traits\GetSpreasheetMapTrait;
use BMS\Helper\Traits\ValidateDataFormTrait;
use BMS\Infrastructure\Repository\UtenteRepository;
use BMS\Infrastructure\Repository\UtenteTratamentosRepository;
use BMS\Model\Tratamentos\TratamentosMedicacao;

class CreateTratamento implements CreateUtenteInterface
{
    use ValidateDataFormTrait;
    use GetSpreasheetMapTrait;

    public function create(array $post, int $id): int
    {
        $path = 'mapTratamento';
        $data = $this->getMap($path);
        $dataValidated = $this->validateData($data, $post);

        $tratamentosMedicacao = new TratamentosMedicacao($dataValidated);

        $utenteRepository = new UtenteRepository();
        $spreadsheet = $utenteRepository->findUtente($id);
        $tratamentosRepository = new UtenteTratamentosRepository();
        $tratamentosRepository->updateData($tratamentosMedicacao, $spreadsheet);

        return $id;
    }
}
