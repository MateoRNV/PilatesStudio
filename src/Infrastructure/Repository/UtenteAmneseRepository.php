<?php

namespace BMS\Infrastructure\Repository;

use BMS\Infrastructure\GoogleSheets\GoogleSheetsConnection;
use BMS\Infrastructure\GoogleSheets\GoogleSheetsCreation;
use BMS\Model\Utente;
use Google\Service\Sheets\BatchGetValuesResponse;
use Google\Service\Sheets\BatchUpdateValuesResponse;
use Google\Service\Sheets\Spreadsheet;

class UtenteAmneseRepository
{
    private GoogleSheetsConnection $connection;

    public function __construct()
    {
        $this->connection = new GoogleSheetsConnection();
    }

    /**
     * @param Utente $utente
     * @param string $spreadsheetId
     * @return BatchUpdateValuesResponse
     */
    public function updateData(Utente $utente, string $spreadsheetId): BatchUpdateValuesResponse
    {
        $params = $this->getParams($utente);

        $body = new \Google_Service_Sheets_BatchUpdateValuesRequest($params);
        $connect = $this->connection->connect();
        return $connect->spreadsheets_values->batchUpdate($spreadsheetId, $body);
    }

    /**
     * @param string $spreadsheetId
     * @return array Amnese Data
     */
    public function getData(string $spreadsheetId): array
    {
        $batchGet = $this->batchGet($spreadsheetId);
        $valueRanges = $batchGet->getValueRanges();

        $amneseDatas = $this->extractData($valueRanges);
        $amnese = $this->processData($amneseDatas);

        return $amnese;
    }

    /**
     * @param Utente $utente
     * @return array Params
     */
    private function getParams(Utente $utente): array
    {
        $amneseData = $utente->amneseData();

        foreach ($amneseData as $keyAmnese => $valueAmnese) {
            $data[] = [
                'range' => $keyAmnese,
                'values' => [
                    [$valueAmnese]
                ]
            ];
        }

        return [
            'valueInputOption' => 'RAW',
            'data' => $data
        ];
    }

    /**
     * @param string $spreadsheetId
     * @return BatchGetValuesResponse
     */
    private function batchGet(string $spreadsheetId): BatchGetValuesResponse
    {
        $optParams = [
            'ranges' => [
                'Sheet1!B3', 'Sheet1!B4', 'Sheet1!D4', 'Sheet1!H4', 'Sheet1!B5', 'Sheet1!B7', 'Sheet1!F7', 'Sheet1!J7', 'Sheet1!B9', 'Sheet1!G9'
            ]
        ];

        $connect = $this->connection->connect();
        $spreadsheetsValues = $connect->spreadsheets_values;
        $batchGet = $spreadsheetsValues->batchGet($spreadsheetId, $optParams);
        return $batchGet;
    }

    /**
     * @param array $valueRanges
     * @return array
     */
    private function extractData(array $valueRanges): array
    {
        $amneseDatas = array();
        foreach ($valueRanges as $valueRange) {
            $values = $valueRange->values;
            foreach ($values as $valuesInside) {
                $amneseData = $valuesInside;
                foreach ($amneseData as $data) {
                    $amneseDatas[] = $data;
                }
            }
        }
        return $amneseDatas;
    }

    /**
     * @param array $amneseDatas
     * @return array
     */
    private function processData(array $amneseDatas): array
    {
        $nameKeys = [
            'name',
            'birthDate',
            'age',
            'nationality',
            'address',
            'phone',
            'emergencyPhone',
            'emergencyName',
            'email',
            'nif'
        ];

        return array_combine($nameKeys, $amneseDatas);
    }
}
