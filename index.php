<?php

//Include composer autoload
include './vendor/autoload.php';

use HarToPostmanCollection\FileConverter;

$fileConverter = new FileConverter(__DIR__);
$result = $fileConverter->run();

//Print result
printf('HAR TO POSTMAN COLLECTION CONVERTER RESULTS%s', PHP_EOL);
printf('--------------------------------%s', PHP_EOL);
foreach ($result as $file => $result) {
    printf('- SOURCE FILE: %s, STATUS: %s %s', $file, $result ? 'OK' : 'FAIL', PHP_EOL);
}