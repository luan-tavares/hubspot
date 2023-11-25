<?php

namespace LTL\Hubspot\Tests\Response;

use LTL\Curl\Curl;
use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Containers\ResponseRepositoryContainer;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Interfaces\Schemas\ActionSchemaInterface;
use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Resources\V3\HubDbHubspot;
use PHPUnit\Framework\TestCase;

class ResponseIterableTest extends TestCase
{
    private CurlInterface $curl;

    private ActionSchemaInterface $actionSchema;

    private array $result;

    protected function setUp(): void
    {
        $this->result = [
            'results' => [
                'a' => 4,
                'b' => 5,
                'c' => null,
                'd' => ['a' => 5],
                'e' => false
            ],
            'paging' => [
                'next' => [
                    'after' => 100
                ]
            ]
        ];

        $this->curl = $this->getMockBuilder(Curl::class)->disableOriginalConstructor()->getMock();
        $this->curl->method('status')->willReturn(400);
        $this->curl->method('response')->willReturn(json_encode($this->result));
        $this->curl->method('uri')
            ->willReturn('https://test.com/api?hapikey=12345678-1234-1234-1234-abcde1234567');
        $this->curl->method('headers')->willReturn(['Content-Type' => 'application/json;charset=utf-8']);

        $contactResource = $this->createMock(HubDbHubspot::class);
        $contactResource->method('__toString')->willReturn('hub-db-v3');
        $this->actionSchema = SchemaContainer::getAction($contactResource, 'getAll');
    }


    public function testIfIterableIsCorrect()
    {
        $response = new Response($this->curl, $this->actionSchema);

        foreach ($response as $value) {
            $return[] = $value;
        }
      
        $this->assertEquals($return, [
            4,
            5,
            null,
            (object) [ 'a' => 5 ],
            false
        ]);
    }

    public function testIfContableIsCorrect()
    {
        $response = new Response($this->curl, $this->actionSchema);
      
        $this->assertEquals(count($response), count($this->result['results']));
    }

    public function testIfGetMagicCatchAfterIsCorrect()
    {
        $response = new Response($this->curl, $this->actionSchema);

        $this->assertEquals($response->after, 100);
    }


    public function testIfGetMagicUnknowPropertyIsNull()
    {
        $response = new Response($this->curl, $this->actionSchema);

        $this->assertNull($response->unknowProperty);
    }

    public function testIftoArrayMethodIsCorrect()
    {
        $response = new Response($this->curl, $this->actionSchema);

        $this->assertEquals($response->toArray(), $this->result);
    }

    public function testIfDestroyResponseRepositoryIsCorrect()
    {
        $response = new Response($this->curl, $this->actionSchema);
        $response->toArray(); /*The container is inicialized after call a method*/
        $initCount = ResponseRepositoryContainer::count();
        unset($response);
        $finalCount = ResponseRepositoryContainer::count();
        $this->assertEquals($initCount - $finalCount, 1);
    }

    public function testIfGetUrlAndHideApiMethodIsCorrect()
    {
        $response = new Response($this->curl, $this->actionSchema);

        $this->assertEquals(
            $response->getUri(),
            'https://test.com/api?hapikey=xxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx'
        );
    }

    public function testIfGetStatusMethodIsCorrect()
    {
        $response = new Response($this->curl, $this->actionSchema);

        $this->assertEquals(
            $response->getStatus(),
            400
        );
    }

    public function testIfGetDocumentationMethodIsCorrect()
    {
        $response = new Response($this->curl, $this->actionSchema);

        $this->assertEquals(
            $response->getDocumentation(),
            'https://developers.hubspot.com/docs/api/cms/hubdb'
        );
    }

    public function testIfGetHeadersMethodIsCorrect()
    {
        $response = new Response($this->curl, $this->actionSchema);
        $this->assertEquals(
            $response->getHeaders(),
            ['Content-Type' => 'application/json;charset=utf-8']
        );
    }

    public function testIfHasErrorsMethodIsCorrect()
    {
        $response = new Response($this->curl, $this->actionSchema);
        $this->assertEquals(
            $response->hasErrors(),
            true
        );
    }
}
