<?php

use App\Bootstrap\Autoload;

include_once(__DIR__ . '/../src/Bootstrap/Autoload.php');
$rootDir = realpath(__DIR__ . '/..');
Autoload::bootstrapVendor($rootDir);
