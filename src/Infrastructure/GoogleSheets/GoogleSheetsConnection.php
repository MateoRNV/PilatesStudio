<?php

namespace BMS\Infrastructure\GoogleSheets;

use Google\Client;
use Google\Service\Drive;
use Google_Service_Sheets;

class GoogleSheetsConnection
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function connect(): Google_Service_Sheets
    {
        $this->client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
        $this->client->setAccessType('offline');
        $this->client->setAuthConfig(__DIR__ . '/../../../credentials.json');
        return new Google_Service_Sheets($this->client);
    }
}
