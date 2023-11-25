<?php

namespace LTL\Hubspot\Tests\Response;

use LTL\Curl\Curl;
use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Containers\ResponseRepositoryContainer;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Interfaces\Schemas\ActionSchemaInterface;
use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Resources\V3\ContactHubspot;
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
            'e' => array_fill(0, 200, 'TATAKAE')
        ];

        $this->curl = $this->getMockBuilder(Curl::class)->disableOriginalConstructor()->getMock();
        $this->curl->method('response')->willReturn(json_encode($this->result));

        $this->actionSchema = SchemaContainer::getAction(new ContactHubspot, 'get');
    }

    public function testIfNotIterableThrowHubspotApiException()
    {
        $response = new Response($this->curl, $this->actionSchema);

       
        $this->expectException(HubspotApiException::class);

        foreach ($response as $value) {
        }
    }


    public function testIfNotIterableThrowException()
    {
        $response = new Response($this->curl, $this->actionSchema);

        $responseSlice = mb_strimwidth(json_encode($this->result), 0, 150, ' ...');

        $this->expectExceptionMessage(
            "Resource response is not iterable or countable:\n\n{$responseSlice}\n\n"
        );

        foreach ($response as $value) {
        }
    }

    public function testIfCountableThrowException()
    {
        $response = new Response($this->curl, $this->actionSchema);

        $responseSlice = mb_strimwidth(json_encode($this->result), 0, 150, ' ...');

        $this->expectExceptionMessage(
            "Resource response is not iterable or countable:\n\n{$responseSlice}\n\n"
        );

        count($response);
    }

    public function testIfCountableThrowHubspotApiException()
    {
        $response = new Response($this->curl, $this->actionSchema);

        $this->expectException(HubspotApiException::class);

        count($response);
    }

    public function testIfAfterPropertyObjectIsNull()
    {
        $response = new Response($this->curl, $this->actionSchema);

        $this->assertNull($response->after);
    }
}