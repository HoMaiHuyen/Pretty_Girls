<?php 

// define("ROOT_URL","....");

$envFilePath = __DIR__ . '/../.env';

if (file_exists($envFilePath)) {
    $envValues = parse_ini_file($envFilePath, false, INI_SCANNER_RAW);
    $rootUrl = $envValues['ROOT_URL'] ?? null;
    if ($rootUrl !== null) {
        define("ROOT_URL", $rootUrl);
    } else {
        define("ROOT_URL", "http://localhost/");
    }
}
