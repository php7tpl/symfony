<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/php7lab/sandbox/src/App/Libs/bootstrapEnv.php';

$_SERVER += $_ENV;
$_SERVER['APP_ENV'] = $_ENV['APP_ENV'] = ($_SERVER['APP_ENV'] ?? $_ENV['APP_ENV'] ?? null) ?: 'dev';
$_SERVER['APP_DEBUG'] = $_SERVER['APP_DEBUG'] ?? $_ENV['APP_DEBUG'] ?? 'prod' !== $_SERVER['APP_ENV'];
$_SERVER['APP_DEBUG'] = $_ENV['APP_DEBUG'] = (int) $_SERVER['APP_DEBUG'] || filter_var($_SERVER['APP_DEBUG'], FILTER_VALIDATE_BOOLEAN) ? '1' : '0';

/** Подключение рельсов */
/*include_once(__DIR__ . '/../vendor/php7rails/app/src/libs/Boot.php');
$boot = new \php7rails\app\libs\Boot;
$boot->appName = 'frontend';
$boot->init();
$boot->loadConfig([
    'config/rails/env',
    'config/rails/env-local',
]);
$boot->setAliases([
    '@yubundle/bundle' => 'vendor/yubundle/bundle/src',
]);*/

/** Объявление констант */
\php7rails\app\helpers\Constant::setBase();
