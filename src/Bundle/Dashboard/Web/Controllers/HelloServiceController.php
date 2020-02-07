<?php

namespace App\Bundle\Dashboard\Web\Controllers;

use PhpLab\Core\Enums\Http\HttpHeaderEnum;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HelloServiceController extends AbstractController
{

    private $services = [];
    private $wsdlFileName = __DIR__ . '/../config/wsdl';

    public function __construct()
    {
        $this->services['hello'] = new HelloService;
    }

    public function definition(string $name)
    {
        $response = new Response;
        $response->headers->set(HttpHeaderEnum::CONTENT_TYPE, 'text/xml');
        $content = file_get_contents($this->getDefinitionFileName($name));
        $response->setContent($content);
        return $response;
    }

    public function handle(string $name = 'hello')
    {
        $soapServer = new \SoapServer($this->getDefinitionFileName($name));
        $serviceInstance = $this->services[$name];
        $soapServer->setObject($serviceInstance);
        $response = new Response();
        $response->headers->set('Content-Type', 'text/xml; charset=ISO-8859-1');
        ob_start();
        $soapServer->handle();
        $response->setContent(ob_get_clean());
        return $response;
    }

    public function test()
    {
        /** @var HelloInterface $soapClient */
        $soapClient = new \SoapClient('http://symfony.tpl/wsdl-service/hello.wsdl');
        $result = $soapClient->hello('Scott');
        dd($result);
    }

    private function getDefinitionFileName(string $serviceName) {
        return $this->wsdlFileName . '/' . $serviceName . '.wsdl';
    }

}

interface HelloInterface {
    public function hello(string $name): string;
}

class HelloService implements HelloInterface
{
    public function hello(string $name): string
    {
        return 'Hello, ' . $name;
    }
}
