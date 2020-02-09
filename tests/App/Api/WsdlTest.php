<?php

namespace Tests\User\Api;

use App\Bundle\Dashboard\Web\Controllers\HelloInterface;
use PhpLab\Test\Base\BaseRestTest;

class WsdlTest extends BaseRestTest
{

    protected $basePath = '';

    public function testMainPage()
    {
        $endpoint = rtrim($this->baseUrl, '/') . '/wsdl/';
        /** @var HelloInterface $helloService */
        $helloService = new \SoapClient($endpoint . 'definition/hello.wsdl');
        $helloResult = $helloService->hello('Scott');
        $this->assertEquals([
            "Hello, Scott",
            "WTF???",
        ], $helloResult);
    }

}
