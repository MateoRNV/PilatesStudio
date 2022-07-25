<?php

namespace BMS\Infrastructure\Repository;

use BMS\Helper\Traits\ProcessDataUtentesTrait;
use BMS\Infrastructure\GoogleSheets\GoogleSheetsConnection;
use BMS\Model\Dor\Dor;
use BMS\Model\Queixas\Queixas;
use Google\Service\Sheets\BatchGetValuesResponse;
use Google\Service\Sheets\BatchUpdateValuesResponse;

class UtenteDorRepository
{
    private GoogleSheetsConnection $connection;

    use ProcessDataUtentesTrait;

    public function __construct()
    {
        $this->connection = new GoogleSheetsConnection();
    }

    public function updateData(Dor $dor, string $spreadsheetId): BatchUpdateValuesResponse
    {
        $params = $this->getParams($dor);

        $body = new \Google_Service_Sheets_BatchUpdateValuesRequest($params);
        $connect = $this->connection->connect();
        return $connect->spreadsheets_values->batchUpdate($spreadsheetId, $body);
    }

    private function getParams(Dor $dor): array
    {
        $dores = $dor->getDores();

        $data = [];
        foreach ($dores as $keyDor => $valueDor) {
            $data[] = [
                'range' => $keyDor,
                'values' => [
                    [$valueDor]
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

        $path = 'mapDor';
        $datas = $this->extractData($valueRanges);
        return $this->processData($datas, $path);
    }

    private function batchGet(string $spreadsheetId): BatchGetValuesResponse
    {
        $optParams = [
            'ranges' => [
                'Sheet1!C110', 'Sheet1!C111', 'Sheet1!C112', 'Sheet1!C113', 'Sheet1!F114', 'Sheet1!H114', 'Sheet1!J114', 'Sheet1!L114', 'Sheet1!F115', 'Sheet1!H115', 'Sheet1!J115', 'Sheet1!L115', 'Sheet1!F116', 'Sheet1!H116', 'Sheet1!J116', 'Sheet1!L116', 'Sheet1!F117', 'Sheet1!H117', 'Sheet1!J117', 'Sheet1!L117', 'Sheet1!F118', 'Sheet1!H118', 'Sheet1!J118', 'Sheet1!F119', 'Sheet1!H119', 'Sheet1!J119', 'Sheet1!L119', 'Sheet1!F120', 'Sheet1!H120', 'Sheet1!J120', 'Sheet1!L120', 'Sheet1!F121', 'Sheet1!H121', 'Sheet1!J121', 'Sheet1!L121', 'Sheet1!F122', 'Sheet1!H122', 'Sheet1!J122', 'Sheet1!L122', 'Sheet1!F123', 'Sheet1!H123', 'Sheet1!J123', 'Sheet1!L123', 'Sheet1!D124', 'Sheet1!F124', 'Sheet1!H124', 'Sheet1!J124', 'Sheet1!L124'
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