<?php

namespace BMS\Infrastructure\Repository;

use BMS\Helper\Traits\ProcessDataUtentesTrait;
use BMS\Infrastructure\GoogleSheets\GoogleSheetsConnection;
use BMS\Model\AmnesePorAparelhos\AmnesePorAparelhos;
use Google\Service\Sheets\BatchGetValuesResponse;
use Google\Service\Sheets\BatchUpdateValuesResponse;

class UtenteAmnesePorAparelhosRepository
{
    private GoogleSheetsConnection $connection;

    use ProcessDataUtentesTrait;

    public function __construct()
    {
        $this->connection = new GoogleSheetsConnection();
    }

    public function updateData(AmnesePorAparelhos $amnesePorAparelhos, string $spreadsheetId): BatchUpdateValuesResponse
    {
        $params = $this->getParams($amnesePorAparelhos);

        $body = new \Google_Service_Sheets_BatchUpdateValuesRequest($params);
        $connect = $this->connection->connect();
        return $connect->spreadsheets_values->batchUpdate($spreadsheetId, $body);
    }

    private function getParams(AmnesePorAparelhos $amnesePorAparelhos): array
    {
        $utenteData = $amnesePorAparelhos->getAparelhos();

        foreach ($utenteData as $keyQuestao => $valueQuestao) {
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

        $path = 'mapAparelhos';
        $datas = $this->extractData($valueRanges);
        return $this->processData($datas, $path);
    }

    private function batchGet(string $spreadsheetId): BatchGetValuesResponse
    {
        $optParams = [
            'ranges' => [
                'Sheet1!D81', 'Sheet1!F81', 'Sheet1!H81', 'Sheet1!D82', 'Sheet1!D83', 'Sheet1!F82', 'Sheet1!F83', 'Sheet1!H82', 'Sheet1!H83', 'Sheet1!J82', 'Sheet1!J83', 'Sheet1!D84', 'Sheet1!D85', 'Sheet1!F84', 'Sheet1!H84', 'Sheet1!J84', 'Sheet1!D86', 'Sheet1!D87', 'Sheet1!F86', 'Sheet1!F87', 'Sheet1!H86', 'Sheet1!H87', 'Sheet1!J86', 'Sheet1!J87', 'Sheet1!D88', 'Sheet1!D89', 'Sheet1!F88', 'Sheet1!F89', 'Sheet1!H88', 'Sheet1!J88', 'Sheet1!D90', 'Sheet1!D91', 'Sheet1!F90', 'Sheet1!F91', 'Sheet1!H90', 'Sheet1!J90', 'Sheet1!D92', 'Sheet1!D93', 'Sheet1!F92', 'Sheet1!F93', 'Sheet1!H92', 'Sheet1!H93', 'Sheet1!J92', 'Sheet1!J93', 'Sheet1!D94', 'Sheet1!D95', 'Sheet1!F94', 'Sheet1!F95', 'Sheet1!H94', 'Sheet1!H95', 'Sheet1!J94', 'Sheet1!J95', 'Sheet1!D96', 'Sheet1!D97', 'Sheet1!F96', 'Sheet1!F97', 'Sheet1!H96', 'Sheet1!H97', 'Sheet1!J96', 'Sheet1!J97', 'Sheet1!D98', 'Sheet1!F98', 'Sheet1!H98'
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