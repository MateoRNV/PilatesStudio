<?php

namespace BMS\Helper\CreateUtente;

use BMS\Helper\Interfaces\CreateUtenteInterface;
use BMS\Helper\Traits\GetSpreasheetMapTrait;
use BMS\Helper\Traits\ValidateDataFormTrait;
use BMS\Infrastructure\Repository\UtenteAmneseRepository;
use BMS\Infrastructure\Repository\UtenteRepository;
use BMS\Model\Amnese\Amnese;
use BMS\Model\Amnese\Contact;
use BMS\Model\Amnese\EmergencyContact;
use BMS\Model\Amnese\PersonalData;
use BMS\Model\Utente;

class CreateAmnese implements CreateUtenteInterface
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
        $path = 'mapAmnese';
        $amneseData = $this->getMap($path);
        $amneseValidate = $this->validateData($amneseData, $post);

        $personalData = new PersonalData($amneseValidate['Sheet1!B3'], $amneseValidate['Sheet1!B4'], $amneseValidate['Sheet1!D4'], $amneseValidate['Sheet1!H4'], $amneseValidate['Sheet1!B5']);
        $utente = new Utente($amneseValidate);

        $utenteRepository = new UtenteRepository();
        $amneseRepository = new UtenteAmneseRepository();

        if (is_null($id)) {
            $newSpreadsheet = $utenteRepository->save($personalData->name);
            $spreadsheetId = $newSpreadsheet->spreadsheetId;
            $spreadsheetUrl = $newSpreadsheet->spreadsheetUrl;
            $response = $utenteRepository->createDataUtenteRef($personalData, $spreadsheetId, $spreadsheetUrl);
            $amneseRepository->updateData($utente, $spreadsheetId);
            return $response['id'];
        }

        $spreadsheetId = $utenteRepository->findUtente($id);
        $amneseRepository->updateData($utente, $spreadsheetId);
        $utenteRepository->updateData($personalData, $id);

        return $id;
    }
}