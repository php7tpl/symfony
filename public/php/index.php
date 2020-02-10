<?php

require __DIR__ . '/../../vendor/autoload.php';

\PhpLab\Core\Libs\Env\DotEnvHelper::init();

$module = new \PhpLab\Sandbox\Article\Api\ArticleModule;
$module->run();
