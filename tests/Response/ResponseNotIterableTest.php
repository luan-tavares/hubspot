<?php

namespace LTL\Hubspot\Tests\Response;

use LTL\Curl\Curl;
use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Containers\ResponseRepositoryContainer;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Interfaces\Schemas\ActionSchemaInterface;
use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Resources\ContactHubspot;
use PHPUnit\Framework\TestCase;

class ResponseNotIterableTest extends TestCase
{
    private CurlInterface $curl;

    private ActionSchemaInterface $actionSchema;

    private array $result;

    protected function setUp(): void
    {
        $this->result = [
            'a' => 4,
            'b' => 5,
            'c' => null,
            'd' => ['a' => 5],
            'e' => false
        ];

        $this->curl = $this->getMockBuilder(Curl::class)->disableOriginalConstructor()->getMock();
        $this->curl->method('getStatus')->willReturn(400);
        $this->curl->method('getResponse')->willReturn(json_encode($this->result));
        $this->curl->method('getUri')
            ->willReturn('https://test.com/api?hapikey=12345678-1234-1234-1234-abcde1234567');
        $this->curl->method('getHeaders')->willReturn(['Content-Type' => 'application/json;charset=utf-8']);

        $contactResource = $this->createMock(ContactHubspot::class);
        $contactResource->method('__toString')->willReturn('contact-v3');
        $this->actionSchema = SchemaContainer::getAction($contactResource, 'get');
    }


    public function testIfIterableThrowException()
    {
        $response = new Response($this->curl, $this->actionSchema);

        $this->expectException(HubspotApiException::class);

        foreach ($response as $value) {
        }
    }

    public function testIfCountableThrowException()
    {
        $response = new Response($this->curl, $this->actionSchema);

        $this->expectException(HubspotApiException::class);

        $count = count($response);
    }

    public function testIfAfterPropertyObjectIsNull()
    {
        $response = new Response($this->curl, $this->actionSchema);

        $this->assertNull($response->after);
    }
}
