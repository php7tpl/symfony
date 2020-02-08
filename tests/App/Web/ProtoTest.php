<?php

namespace Tests\User\Web;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Collection;
use PhpLab\Bundle\Crypt\Libs\Encoder;
use PhpLab\Bundle\Crypt\Libs\Encoders\Base64Encoder;
use PhpLab\Bundle\Crypt\Libs\Encoders\EncoderInterface;
use PhpLab\Bundle\Crypt\Libs\Encoders\JsonEncoder;
use PhpLab\Core\Domain\Helpers\EntityHelper;
use PhpLab\Core\Enums\Http\HttpStatusCodeEnum;
use PhpLab\Rest\Entities\ProtoEntity;
use PhpLab\Rest\Libs\RestProto;
use PhpLab\Test\Base\BaseRestTest;

class ProtoTest extends BaseRestTest
{

    protected $basePath = '';

    public function testMainPage()
    {
        $protoEntity = $this->protoRequest('GET', '/api/v1/article', ['id' => 123]);
        $body = json_decode($protoEntity->content, true);
        $response = new Response($protoEntity->statusCode, $protoEntity->headers);
        $this->assertEquals(HttpStatusCodeEnum::OK, $response->getStatusCode());
        $this->assertEquals([[
            "id" => 123,
            "category_id" => 3,
            "title" => "post 123",
            "category" => null,
            "created_at" => "2019-11-05T20:23:00+03:00",
            "tags" => null,
        ]], $body);
    }

    private function protoRequest(string $method, string $uri, array $query = [], array $body = [])
    {
        $encoder = $this->getEncoder();
        $client = $this->getGuzzleClient();

        $requestProtoEntity = new ProtoEntity;
        $requestProtoEntity->method = $method;
        $requestProtoEntity->uri = $uri;
        $requestProtoEntity->headers = ['Content-Type' => 'application/x-base64'];
        $requestProtoEntity->query = $query;

        $encodedRequest = $encoder->encode($requestProtoEntity);
        $response = $client->request('POST', '/api/', [
            RequestOptions::HEADERS => [
                RestProto::CRYPT_HEADER_NAME => 1,
            ],
            RequestOptions::FORM_PARAMS => [
                'data' => $encodedRequest,
            ],
        ]);
        $encodedContent = $response->getBody()->getContents();
        $payload = $encoder->decode($encodedContent);
        $protoEntity = new ProtoEntity;
        EntityHelper::setAttributes($protoEntity, $payload);
        return $protoEntity;
    }

    private function getEncoder(): EncoderInterface
    {
        $encoderCollection = new Collection([
            new JsonEncoder,
            new Base64Encoder,
        ]);
        $encoder = new Encoder($encoderCollection);
        return $encoder;
    }

}
