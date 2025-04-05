<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

$client = new Client();

try {
    $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/todos');

    $statusCode = $response->getStatusCode();
    $body = $response->getBody()->getContents();

    echo "Status Code: " . $statusCode . PHP_EOL;
    echo "Body: " . $body . PHP_EOL;
} catch (GuzzleException $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}
?>