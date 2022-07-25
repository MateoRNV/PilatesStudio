<?php

namespace BMS\Infrastructure\GoogleSheets;

use Google\Client;
use Google_Service_Drive;

class GoogleDriveConnection
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function connect(): Google_Service_Drive
    {
        $this->client->setScopes([\Google_Service_Sheets::DRIVE]);
        $this->client->setAccessType('offline');
        $this->client->setAuthConfig(__DIR__ . '/../../../credentials.json');
        return new Google_Service_Drive($this->client);
    }
}