<?php

include './vendor/autoload.php';

use HarToPostmanCollection\FileConverter;
use HarToPostmanCollection\JsonConverter;

$fileConverter = new FileConverter(__DIR__, new JsonConverter());
$result = $fileConverter->run();

printf('HAR TO POSTMAN COLLECTION CONVERTER RESULTS%s', PHP_EOL);
printf('--------------------------------%s', PHP_EOL);
foreach ($result as $file => $result) {
    printf('- SOURCE FILE: %s, STATUS: %s %s', $file, $result ? 'OK' : 'FAIL', PHP_EOL);
}