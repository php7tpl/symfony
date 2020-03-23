<?php

return [
    'vendor' => [
        'downloadUrl' => 'https://tlg-assistant.000webhostapp.com/telegram-client/{version}/vendor.phar.gz',
        'version' => '0.0.7',
    ],
    'profiles' => [
        'vendor' => [
            'sourceDir' => realpath(__DIR__ . '/../../vendor'),
            'outputFile' => realpath(__DIR__ . '/../../vendor') . '/vendor.phar',
            'excludes' => [
                'regex:#\/(|tests|test|docs|doc|examples|example|benchmarks|benchmark|\.git)\/#iu',
                '/composer.json',
                '/composer.lock',
                '/LICENSE',
                '/CHANGELOG',
                '/AUTHORS',
                '/Makefile',
                '/Vagrantfile',
                '/phpbench.json',
                '/appveyor.yml',
                '/phpstan.',
                '/phpunit.xml',
                '/amphp/http-client-cookies/res/',
                '/zendframework/',
                '/tivie/',
                '/nesbot/',
                '/kelunik/',
                //'/league/',
                '/symfony/translation/',
                '/symfony/translation-contracts/',
                //'/symfony/service-contracts/',
                '/php7lab/dev/',
                '/php7lab/test/',
                '/zndoc/rest-api/',
                //'/symfony/web-server-bundle',
                '/phpunit/',
                //'/codeception/',
                'regex:#[\s\S]+\.(md|bat|dist|rar|zip|gz|phar|py|sh|bat|cmd|exe|h|c)#iu',
            ],
        ],
        'app' => [
            'sourceDir' => realpath(__DIR__ . '/../../src'),
            'outputFile' => realpath(__DIR__ . '/../../src') . '/app.phar',
            'excludes' => [
                '/src/Bootstrap/',
                '/src/Migrations/',
                '/src/Fixtures/',
            ],
        ],
    ],
];
