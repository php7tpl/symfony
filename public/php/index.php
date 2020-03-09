<?php

use Illuminate\Container\Container;
use PhpLab\Rest\Helpers\RestApiControllerHelper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouteCollection;

require __DIR__ . '/../../vendor/autoload.php';

\PhpLab\Core\Libs\Env\DotEnvHelper::init();

$container = Container::getInstance();
$routeCollection = new RouteCollection;

include_once(__DIR__ . '/bootstrap.php');

$response = RestApiControllerHelper::run($routeCollection, $container, '/', Request::createFromGlobals());
$response->send();
