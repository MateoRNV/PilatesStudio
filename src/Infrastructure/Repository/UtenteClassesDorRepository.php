<?php

namespace BMS\Infrastructure\Repository;

use BMS\Helper\Traits\ProcessDataUtentesTrait;
use BMS\Infrastructure\GoogleSheets\GoogleSheetsConnection;
use BMS\Model\ClassesDeDor\ClassesDor;
use Google\Service\Sheets\BatchGetValuesResponse;
use Google\Service\Sheets\BatchUpdateValuesResponse;

class UtenteClassesDorRepository
{
    private GoogleSheetsConnection $connection;

    use ProcessDataUtentesTrait;

    public function __construct()
    {
        $this->connection = new GoogleSheetsConnection();
    }

    public function updateData(ClassesDor $classesDor, string $spreadsheetId): BatchUpdateValuesResponse
    {
        $params = $this->getParams($classesDor);

        $body = new \Google_Service_Sheets_BatchUpdateValuesRequest($params);
        $connect = $this->connection->connect();
        return $connect->spreadsheets_values->batchUpdate($spreadsheetId, $body);
    }

    private function getParams(ClassesDor $classesDor): array
    {
        $classesDor = $classesDor->getClassesDor();

        $data = [];
        foreach ($classesDor as $keyClasses => $valueClasses) {
            $data[] = [
                'range' => $keyClasses,
                'values' => [
                    [$valueClasses]
                ]
            ];
        }

        return [
            'valueInputOption' => 'RAW',
            'data' => $data
        ];
    }

    public function getData(string $spreadsheetId): array
    {
        $batchGet = $this->batchGet($spreadsheetId);
        $valueRanges = $batchGet->getValueRanges();

        $path = 'mapClassesDor';
        $datas = $this->extractData($valueRanges);
        return $this->processData($datas, $path);
    }

    private function batchGet(string $spreadsheetId): BatchGetValuesResponse
    {
        $optParams = [
            'ranges' => [
                'Sheet1!L127', 'Sheet1!L128', 'Sheet1!L129', 'Sheet1!L130', 'Sheet1!L131', 'Sheet1!L132', 'Sheet1!L133', 'Sheet1!L134', 'Sheet1!L135'
            ]
        ];

        $connect = $this->connection->connect();
        $spreadsheetsValues = $connect->spreadsheets_values;
        $batchGet = $spreadsheetsValues->batchGet($spreadsheetId, $optParams);
        return $batchGet;
    }

    private function extractData(array $valueRanges): array
    {
        $utenteDatas = array();
        foreach ($valueRanges as $valueRange) {
            $values = $valueRange->values;
            if (!is_null($values)) {
                foreach ($values as $valuesInside) {
                    $utenteData = $valuesInside;
                    foreach ($utenteData as $data) {
                        $utenteDatas[$valueRange->range] = $data;
                    }
                }
            }
        }
        return $utenteDatas;
    }
}