<?php

use App\Bootstrap\Autoloader;

include_once(__DIR__ . '/../../src/Bootstrap/Autoloader.php');
$rootDir = realpath(__DIR__ . '/../..');
Autoloader::bootstrapVendor($rootDir);
