<?php

namespace BMS\Infrastructure\Repository;

use BMS\Helper\Traits\ProcessDataUtentesTrait;
use BMS\Infrastructure\GoogleSheets\GoogleSheetsConnection;
use BMS\Model\Queixas\Queixas;
use Google\Service\Sheets\BatchGetValuesResponse;
use Google\Service\Sheets\BatchUpdateValuesResponse;

class UtenteQueixasRepository
{
    private GoogleSheetsConnection $connection;

    use ProcessDataUtentesTrait;

    public function __construct()
    {
        $this->connection = new GoogleSheetsConnection();
    }

    public function updateData(Queixas $queixas, string $spreadsheetId): BatchUpdateValuesResponse
    {
        $params = $this->getParams($queixas);

        $body = new \Google_Service_Sheets_BatchUpdateValuesRequest($params);
        $connect = $this->connection->connect();
        return $connect->spreadsheets_values->batchUpdate($spreadsheetId, $body);
    }

    private function getParams(Queixas $queixas): array
    {
        $questoes = $queixas->getQueixas();

        $data = [];
        foreach ($questoes as $keyQuestao => $valueQuestao) {
            $data[] = [
                'range' => $keyQuestao,
                'values' => [
                    [$valueQuestao]
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
        $datas = $this->extractData($valueRanges);

        $path = 'mapQueixas';
        return $this->processData($datas, $path);
    }

    private function batchGet(string $spreadsheetId): BatchGetValuesResponse
    {
        $optParams = [
            'ranges' => [
                'Sheet1!C12', 'Sheet1!A15', 'Sheet1!A18', 'Sheet1!A21', 'Sheet1!A23', 'Sheet1!A27', 'Sheet1!A30', 'Sheet1!A34', 'Sheet1!A36', 'Sheet1!A38', 'Sheet1!A40', 'Sheet1!D41', 'Sheet1!F41', 'Sheet1!H41', 'Sheet1!J41', 'Sheet1!L41', 'Sheet1!D44', 'Sheet1!D46', 'Sheet1!F46', 'Sheet1!H46', 'Sheet1!J46', 'Sheet1!L46', 'Sheet1!D48', 'Sheet1!F48', 'Sheet1!H48', 'Sheet1!J48', 'Sheet1!D52', 'Sheet1!F52', 'Sheet1!H52', 'Sheet1!D64', 'Sheet1!D54', 'Sheet1!J54', 'Sheet1!D57', 'Sheet1!F57', 'Sheet1!H57', 'Sheet1!H58', 'Sheet1!H59', 'Sheet1!D62', 'Sheet1!D63', 'Sheet1!F63', 'Sheet1!H63', 'Sheet1!B65', 'Sheet1!H65', 'Sheet1!B66'
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
