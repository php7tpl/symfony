<?php

namespace Tests\User\Api;

use PhpLab\Sandbox\Wsdl\Symfony\Api\Controllers\HelloInterface;
use PhpLab\Test\Base\BaseRestApiTest;

class WsdlTest extends BaseRestApiTest
{

    protected $basePath = '';

    public function testMock()
    {
        $this->assertTrue(true);
    }

    public function ___testMainPage()
    {
        $endpoint = $this->baseUrl . '/wsdl/';
        /** @var HelloInterface $helloService */
        $helloService = new \SoapClient($endpoint . 'definition/hello.wsdl');
        $helloResult = $helloService->hello('Scott');
        $this->assertEquals([
            "Hello, Scott",
            "WTF???",
        ], $helloResult);
    }

}
