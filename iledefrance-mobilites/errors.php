<?php
$httpClient = new \GuzzleHttp\Client();
$response = $httpClient->get("https://example.com");
$htmlString = (string) $response->getBody();
?>