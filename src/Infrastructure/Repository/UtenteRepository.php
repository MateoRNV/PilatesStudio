<?php

namespace BMS\Infrastructure\Repository;

use BMS\Infrastructure\GoogleSheets\GoogleDriveConnection;
use BMS\Infrastructure\GoogleSheets\GoogleSheetsConnection;
use BMS\Infrastructure\GoogleSheets\GoogleSheetsCreation;
use BMS\Model\Amnese\PersonalData;
use BMS\Model\Queixas\Queixas;
use Google\Service\Sheets\BatchClearValuesResponse;
use Google\Service\Sheets\BatchGetValuesResponse;
use Google\Service\Sheets\BatchUpdateValuesResponse;
use Google\Service\Sheets\Spreadsheet;
use Google_Service_Sheets_BatchUpdateValuesRequest;

class UtenteRepository
{
    private GoogleSheetsConnection $connection;
    private string $spreadsheetId;

    public function __construct()
    {
        $this->connection = new GoogleSheetsConnection();
        $this->spreadsheetId = $_ENV['SPREAD_SHEET_ID'];
    }

    public function createDataUtenteRef(PersonalData $personalData, string $newSpreadsheetId, string $newSpreadsheetUrl): array
    {
        $id = $this->nextId();
        $registrationDate = date('d/m/Y');
        $range = 'UtenteRef';
        $values = [
            [$id, $personalData->name, $personalData->birthDate, $registrationDate, $newSpreadsheetId, $newSpreadsheetUrl]
        ];
        $body = new \Google_Service_Sheets_ValueRange([
            'values' => $values
        ]);
        $params = [
            'valueInputOption' => 'RAW',
            'insertDataOption' => 'INSERT_ROWS'
        ];

        $connect = $this->connection->connect();
        $spreadsheetsValues = $connect->spreadsheets_values;
        $append = $spreadsheetsValues->append(
            $this->spreadsheetId,
            $range,
            $body,
            $params
        );

        return [
            'appendResponse' => $append,
            'id' => $id
        ];
    }

    /**
     * @param PersonalData $personalData
     * @param string $spreadsheetId
     * @return BatchUpdateValuesResponse
     */
    public function updateData(PersonalData $personalData, int $utenteId): BatchUpdateValuesResponse
    {
        $params = $this->getParams($personalData, $utenteId);

        $body = new \Google_Service_Sheets_BatchUpdateValuesRequest($params);
        $connect = $this->connection->connect();
        return $connect->spreadsheets_values->batchUpdate($this->spreadsheetId, $body);
    }

    /**
     * @param PersonalData $personalData
     * @param int $utenteId
     * @return array Params
     */
    private function getParams(PersonalData $personalData, int $utenteId): array
    {
        $utentes = $this->getAllUtentes();

        foreach ($utentes as $keyRaw => $utente) {
            if (!empty($utente) && (int) $utente[0] === $utenteId) {
                $utenteProcessed = $this->extractedData($keyRaw, $personalData, $utente);
                $data = $this->getArrData($utenteProcessed);
            }
        }

        return [
            'valueInputOption' => 'RAW',
            'data' => $data
        ];
    }

    /**
     * @param string $nameUtente
     * @return Spreadsheet New Spreadsheet
     */
    public function save(string $nameUtente): Spreadsheet
    {
        $spreadsheet = new GoogleSheetsCreation();
        $newSpreadsheet = $spreadsheet->createSpreadsheet($this->connection, $nameUtente);
        $newSpreadsheetId = $newSpreadsheet->spreadsheetId;
        $spreadsheet->copySpreadsheetTemplateTo($this->connection, $newSpreadsheetId);
        $dir = __DIR__ . "/../../../utentes/{$nameUtente}";
        mkdir($dir,775);

        return $newSpreadsheet;
    }

    public function delete(int $id, string $spreadsheetID): BatchClearValuesResponse
    {
        $driveConnection = new GoogleDriveConnection();
        $driveConnect = $driveConnection->connect();
        $driveConnect->files->delete($spreadsheetID);

        $batchGet = $this->batchGet();
        $valueRanges = $batchGet->getValueRanges()[0];
        $utentes = $valueRanges->values;

        $range = '';
        foreach ($utentes as $utenteKey => $utente) {
            if ($id === (int) $utente[0]) {
                $rangeKey = $utenteKey + 2;
                $range = "UtenteRef!A{$rangeKey}:F{$rangeKey}";
            }
        }
        $ranges = [
            'ranges' => [$range]
        ];
        $body = new \Google_Service_Sheets_BatchClearValuesRequest($ranges);
        $connect = $this->connection->connect();
        return $connect->spreadsheets_values->batchClear($this->spreadsheetId, $body);
    }

    public function getAllUtentes(): array
    {
        $batchGet = $this->batchGet();
        $valueRanges = $batchGet->getValueRanges()[0];
        return $valueRanges->values;
    }

    public function utentes(): array
    {
        $values = $this->getAllUtentes();
        return $this->processData($values);
    }

    /**
     * @param int $id
     * @return string Spreadsheet ID
     */
    public function findUtente(int $id): string
    {
        $utentes = $this->utentes();

        $spreadsheetId = '';
        foreach ($utentes as $utente) {
            if ($id === (int) $utente['id']) {
                $spreadsheetId = $utente['spreadsheetId'];
            }
        }

        return $spreadsheetId;
    }

    public function nextId(): int
    {
        $utentes = $this->utentes();
        if (empty($utentes)) {
            return 1;
        }

        $lastUtente = end($utentes);

        return $lastUtente['id'] + 1;
    }

    private function batchGet(): BatchGetValuesResponse
    {
        $optParams = [
            'ranges' => [
                'UtenteRef!A2:E'
            ]
        ];

        $connect = $this->connection->connect();
        $spreadsheetsValues = $connect->spreadsheets_values;
        $batchGet = $spreadsheetsValues->batchGet($this->spreadsheetId, $optParams);
        return $batchGet;
    }

    private function processData($values): array
    {
        $utenteData = array();

        if (is_null($values)) {
            return $utenteData;
        }

        $nameKeys = [
            'id',
            'name',
            'birthDate',
            'registrationDate',
            'spreadsheetId'
        ];

        foreach ($values as $value) {
            if (!empty($value)) {
                $utenteData[] = array_combine($nameKeys, $value);
            }
        }

        return $utenteData;
    }

    /**
     * @param int|string $keyRaw
     * @param PersonalData $personalData
     * @param mixed $utente
     * @return void
     */
    public function extractedData(int|string $keyRaw, PersonalData $personalData, mixed $utente): array
    {
        return [
            'UtenteRef!A' . ($keyRaw + 2) => $utente[0],
            'UtenteRef!B' . ($keyRaw + 2) => $personalData->name,
            'UtenteRef!C' . ($keyRaw + 2) => $personalData->birthDate,
            'UtenteRef!D' . ($keyRaw + 2) => $utente[3],
            'UtenteRef!E' . ($keyRaw + 2) => $utente[4],
        ];
    }

    /**
     * @param array $utenteProcessed
     * @return array
     */
    public function getArrData(array $utenteProcessed): array
    {
        foreach ($utenteProcessed as $key => $utenteSearched) {
            $data[] = [
                'range' => $key,
                'values' => [
                    [$utenteSearched]
                ]
            ];
        }
        return $data;
    }
}
