<?php

require __DIR__ . '/../../vendor/autoload.php';

\PhpLab\Core\Libs\Env\DotEnvHelper::init();

$module = new \PhpBundle\Article\Symfony\Api\ArticleModule;
$module->run();
