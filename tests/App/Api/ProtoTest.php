<?php

namespace Tests\User\Api;

use Illuminate\Support\Collection;
use PhpLab\Bundle\Crypt\Libs\Encoders\AesEncoder;
use PhpLab\Bundle\Crypt\Libs\Encoders\Base64Encoder;
use PhpLab\Bundle\Crypt\Libs\Encoders\CollectionEncoder;
use PhpLab\Bundle\Crypt\Libs\Encoders\EncoderInterface;
use PhpLab\Bundle\Crypt\Libs\Encoders\GzEncoder;
use PhpLab\Bundle\Crypt\Libs\Encoders\JsonEncoder;
use PhpLab\Core\Enums\Http\HttpStatusCodeEnum;
use PhpLab\Rest\Helpers\RestHelper;
use PhpLab\Rest\Libs\RestProtoClient;
use PhpLab\Test\Base\BaseRestTest;

class ProtoTest extends BaseRestTest
{

    protected $basePath = '';

    public function testMainPage()
    {
        $restProtoClient = $this->getProtoClient();
        $response = $restProtoClient->request('GET', '/api/v1/article', ['category_id' => 2, 'per-page' => 3]);
        $data = RestHelper::getDataFromResponse($response);

        $this->assertEquals(HttpStatusCodeEnum::OK, $response->getStatusCode());
        $this->assertEquals([
            [
                "id" => 2,
                "category_id" => 2,
                "title" => "post 2",
                "category" => null,
                "created_at" => "2019-11-05T20:23:00+03:00",
                "tags" => null,
            ],
            [
                "id" => 5,
                "category_id" => 2,
                "title" => "post 5",
                "category" => null,
                "created_at" => "2019-11-05T20:23:00+03:00",
                "tags" => null,
            ],
            [
                "id" => 8,
                "category_id" => 2,
                "title" => "post 8",
                "category" => null,
                "created_at" => "2019-11-05T20:23:00+03:00",
                "tags" => null,
            ],
        ], $data);
    }

    private function getProtoClient(): RestProtoClient
    {
        $endpoint = rtrim($this->baseUrl, '/') . '/api/';
        $restProtoClient = new RestProtoClient($endpoint, $this->getEncoder());
        return $restProtoClient;
    }

    private function getEncoder(): EncoderInterface
    {
        $encoderCollection = new Collection([
            new JsonEncoder,
            new AesEncoder($_ENV['AES_ENCODER_KEY']),
            new GzEncoder,
            new Base64Encoder,
        ]);
        $encoder = new CollectionEncoder($encoderCollection);
        return $encoder;
    }
}
