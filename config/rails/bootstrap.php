<?php

use php7rails\app\helpers\Env;

\App::$container->register('security', 'php7extension\yii\base\Security');
\App::$container->register('session', 'Symfony\Component\HttpFoundation\Session\Session')
    ->addMethodCall('start');
\App::$container->register('response', 'Symfony\Component\HttpFoundation\Response');
\App::$container->register('cache', 'Symfony\Component\Cache\Adapter\FilesystemAdapter')
    ->addArgument('')
    ->addArgument(0)
    ->addArgument(ROOT_DIR . '/common/runtime/symfonyCache');

\App::$container->register('jwt', 'PhpLab\Sandbox\Crypt\Services\JwtService')
    ->addMethodCall('setProfiles', [Env::get('encrypt.profiles')]);

/*\App::$container->register('db', 'php7extension\core\db\domain\services\ConnectionService')
    ->addMethodCall('setProfiles', \php7rails\app\helpers\Env::get('servers.db'));*/














/*$domainDefinition = \PhpLab\Domain\Helpers\DomainHelper::getClassConfig('log', 'php7extension\psr\log\Domain');

//d(\PhpLab\Sandbox\Common\Helpers\ClassHelper::createObject($domainDefinition));

//\PhpLab\Domain\Helpers\DomainHelper::getConfigFromDomainClass()

\App::$container->register('log', \PhpLab\Sandbox\Common\Helpers\ClassHelper::createObject($domainDefinition));*/
