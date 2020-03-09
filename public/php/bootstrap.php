<?php

use Illuminate\Container\Container;
use PhpBundle\Article\Symfony\Api\ArticleModule;
use Symfony\Component\Routing\RouteCollection;

/**
 * @var Container $container
 * @var RouteCollection $routeCollection
 */

$articleModule = new ArticleModule;
$articleModule->bindContainer($container);
$articleModule->getRouteCollection($routeCollection);
