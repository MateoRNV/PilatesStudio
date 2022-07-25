<?php

namespace BMS\Infrastructure\Repository;

use BMS\Helper\Traits\ProcessDataUtentesTrait;
use BMS\Infrastructure\GoogleSheets\GoogleSheetsConnection;
use BMS\Model\Doencas\Doencas;
use Google\Service\Sheets\BatchGetValuesResponse;
use Google\Service\Sheets\BatchUpdateValuesResponse;

class UtenteDoencasRepository
{
    private GoogleSheetsConnection $connection;

    use ProcessDataUtentesTrait;

    public function __construct()
    {
        $this->connection = new GoogleSheetsConnection();
    }

    public function updateData(Doencas $doencas, string $spreadsheetId): BatchUpdateValuesResponse
    {
        $params = $this->getParams($doencas);

        $body = new \Google_Service_Sheets_BatchUpdateValuesRequest($params);
        $connect = $this->connection->connect();
        return $connect->spreadsheets_values->batchUpdate($spreadsheetId, $body);
    }

    private function getParams(Doencas $queixas): array
    {
        $questoes = $queixas->getDoencas();

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

        $path = 'mapDoencas';
        $datas = $this->extractData($valueRanges);
        $dataProcessed = $this->processData($datas, $path);
        return $dataProcessed;
    }

    private function batchGet(string $spreadsheetId): BatchGetValuesResponse
    {
        $optParams = [
            'ranges' => [
                'Sheet1!B68', 'Sheet1!B71', 'Sheet1!B74', 'Sheet1!B77'
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