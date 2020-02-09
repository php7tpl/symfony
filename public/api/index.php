<?php

use App\Kernel;
use Illuminate\Support\Collection;
use PhpLab\Bundle\Crypt\Libs\Encoders\AesEncoder;
use PhpLab\Bundle\Crypt\Libs\Encoders\Base64Encoder;
use PhpLab\Bundle\Crypt\Libs\Encoders\CollectionEncoder;
use PhpLab\Bundle\Crypt\Libs\Encoders\GzEncoder;
use PhpLab\Bundle\Crypt\Libs\Encoders\JsonEncoder;
use PhpLab\Rest\Helpers\CorsHelper;
use PhpLab\Sandbox\Proto\Libs\RestProto;
use Symfony\Component\Debug\Debug;
use Symfony\Component\HttpFoundation\Request;

require dirname(__DIR__) . '/../config/bootstrap.php';

$encoderCollection = new Collection([
    new JsonEncoder,
    new AesEncoder($_ENV['AES_ENCODER_KEY']),
    new GzEncoder,
    new Base64Encoder,
]);
$encoder = new CollectionEncoder($encoderCollection);
$restProto = new RestProto($encoder, $_SERVER);
$restProto->prepareRequest();

CorsHelper::autoload();

if ($_SERVER['APP_DEBUG']) {
    umask(0000);

    Debug::enable();
}

if ($trustedProxies = $_SERVER['TRUSTED_PROXIES'] ?? $_ENV['TRUSTED_PROXIES'] ?? false) {
    Request::setTrustedProxies(explode(',', $trustedProxies), Request::HEADER_X_FORWARDED_ALL ^ Request::HEADER_X_FORWARDED_HOST);
}

if ($trustedHosts = $_SERVER['TRUSTED_HOSTS'] ?? $_ENV['TRUSTED_HOSTS'] ?? false) {
    Request::setTrustedHosts([$trustedHosts]);
}

$kernel = new Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']);
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response = $restProto->encodeResponse($response);
$response->send();
$kernel->terminate($request, $response);
