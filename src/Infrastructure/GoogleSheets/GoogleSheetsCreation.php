<?php

namespace BMS\Infrastructure\GoogleSheets;

use Google\Service\Sheets\SheetProperties;
use Google\Service\Sheets\Spreadsheet;

class GoogleSheetsCreation
{
    private string $spreadSheetId;

    public function __construct()
    {
//        $this->spreadSheetId = $_ENV['SPREAD_SHEET_ID'];
        $this->spreadSheetId = '1E527IdjZgMctLmqG7OebhO29JIVXMzrqFg-XLAdYKmM';
    }

    public function createSpreadsheet(GoogleSheetsConnection $connection, string $nameUtente): Spreadsheet
    {
        $requestBody = new \Google_Service_Sheets_Spreadsheet([
            'properties' => [
                'title' => $nameUtente
            ]
        ]);
        $service = $connection->connect();
        return $service->spreadsheets->create($requestBody);
    }

    public function copySpreadsheetTemplateTo(GoogleSheetsConnection $connection, string $spreadsheetIdDestination): SheetProperties
    {
        $service = $connection->connect();
        $sheetIdTemplate = '0';
        $requestBody = new \Google_Service_Sheets_CopySheetToAnotherSpreadsheetRequest();
        $requestBody->setDestinationSpreadsheetId($spreadsheetIdDestination);
        return $service->spreadsheets_sheets->copyTo($this->spreadSheetId, $sheetIdTemplate, $requestBody);
    }
}
