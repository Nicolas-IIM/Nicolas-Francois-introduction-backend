<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

$client = new Client();

$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

try {
    $response = $client->request('GET', 'https://velib-metropole-opendata.smovengo.cloud/opendata/Velib_Metropole/station_status.json');

    $statusCode = $response->getStatusCode();
    $body = json_decode($response->getBody()->getContents(), true);}

echo "<pre>";

