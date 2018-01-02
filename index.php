<?php

include './vendor/autoload.php';

use HarToPostmanCollection\JsonConverter;

$jsonConverter = new JsonConverter();
$file_get_contents = file_get_contents('php://input');
if ($file_get_contents == NULL) {
    printf("Bad request");
    return;
}
$requestJson = json_decode($file_get_contents, true);
$harJson = $requestJson['har'];
$mockServerBaseUrl = $requestJson['baseUrl'];
$collection = $jsonConverter->convertReplacingBaseUrl($harJson, $mockServerBaseUrl);
$json_response = json_encode($collection->toArray(), JSON_UNESCAPED_SLASHES);
printf($json_response);
