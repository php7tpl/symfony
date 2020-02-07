<?php

namespace App\Bundle\Dashboard\Web\Controllers;

use PhpLab\Core\Enums\Http\HttpHeaderEnum;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use PHP2WSDL\PHPClass2WSDL;

class HelloServiceController extends AbstractController
{

    private $services = [];
    private $wsdlFileName = __DIR__ . '/../config/wsdl';

    public function __construct()
    {
        $this->services['hello'] = new HelloService;
    }

    private function generateWsdlFromService(object $serviceInstance): string {
        $serviceURI = "http://symfony.tpl/wsdl";
        $wsdlGenerator = new PHPClass2WSDL($serviceInstance, $serviceURI);
        $wsdlGenerator->generateWSDL(true);
        $content = $wsdlGenerator->dump();
        return $content;
    }

    public function definition(string $name)
    {
        $response = new Response;
        $response->headers->set(HttpHeaderEnum::CONTENT_TYPE, 'text/xml');
        //$content = $this->generateWsdlFromService($this->services[$name]);
        $content = file_get_contents($this->getDefinitionFileName($name));
        $response->setContent($content);
        return $response;
    }

    public function handle(string $name = 'hello')
    {
        //$content = $this->generateWsdlFromService($this->services[$name]);
        //file_put_contents($this->getDefinitionFileName($name), $content);
        $soapServer = new \SoapServer($this->getDefinitionFileName($name));
        //$soapServer = new \SoapServer($this->getDefinitionFileName($name));
        $serviceInstance = $this->services[$name];
        $soapServer->setObject($serviceInstance);
        $response = new Response;
        $response->headers->set('Content-Type', 'text/xml; charset=ISO-8859-1');
        ob_start();
        $soapServer->handle();
        $response->setContent(ob_get_clean());
        return $response;
    }

    public function test()
    {
        /** @var HelloInterface $helloService */
        $helloService = new \SoapClient('http://symfony.tpl/wsdl/definition/hello.wsdl');
        //dd($helloService->__getFunctions());
        $helloResult = $helloService->hello('Scott');
        $method1Result = $helloService->method1('Scott');
        dd([$helloResult, $method1Result]);
    }

    private function getDefinitionFileName(string $serviceName) {
        return $this->wsdlFileName . '/' . $serviceName . '.wsdl';
    }

}

class HelloEntity {

    public $message;

}

interface HelloInterface {
    public function hello(string $name): array;
    public function method1(string $name): string;
}

class HelloService implements HelloInterface
{
    public function hello(string $name): array
    {
        return [
            'Hello, ' . $name,
            'WTF???',
        ];
    }

    public function method1(string $name): string
    {
        return 'method1, ' . $name;
    }
}
