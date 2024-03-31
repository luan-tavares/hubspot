<?php

namespace LTL\Hubspot\Tests\Response;

use LTL\Curl\Curl;
use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Response\RequestInfoObject;
use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Core\Schema\Interfaces\ActionSchemaInterface;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Resources\V3\CompanyHubspot;
use LTL\Hubspot\Resources\V3\HubDbHubspot;
use PHPUnit\Framework\TestCase;

class ResponseIterableTest extends TestCase
{
    private CurlInterface $curl;

    private ActionSchemaInterface $actionSchema;

    private RequestInfoObject $requestInfoObject;

    private array $result = [
        'results' => [
            4,
            5,
            ['a' => 5],
        ],
        'paging' => [
            'next' => [
                'after' => 100
            ]
        ]
    ];

    protected function setUp(): void
    {
        $curl = $this->getMockBuilder(Curl::class)->disableOriginalConstructor()->getMock();
        $curl->method('status')->willReturn(400);
        $curl->method('response')->willReturn(json_encode($this->result));
        $curl->method('uri')
            ->willReturn('https://test.com/api?hapikey=12345678-1234-1234-1234-abcde1234567');
        $curl->method('headers')->willReturn(['Content-Type' => 'application/json;charset=utf-8']);

        $this->requestInfoObject = new RequestInfoObject([
            'hasObject' => false
        ]);

        $this->curl = $curl;

        $contactResource = $this->createMock(HubDbHubspot::class);
        $contactResource->method('__toString')->willReturn('hub-db-v3');
        $this->actionSchema = SchemaContainer::getAction($contactResource, 'getAll');
    }


    public function testIfIterableIsCorrect()
    {
        $response = new Response($this->curl, $this->actionSchema, $this->requestInfoObject);

        foreach ($response as $value) {
            $return[] = $value;
        }
      
        $this->assertEquals($return, [
            4,
            5,
            (object) [ 'a' => 5 ],
        ]);
    }

    public function testIfCountableIsCorrect()
    {
        $response = new Response($this->curl, $this->actionSchema, $this->requestInfoObject);
      
        $this->assertEquals(count($response), count($this->result['results']));
    }

    public function testIfCountableEmptyIsCorrect()
    {
        $result = [
            'results' => [],
        ];

        $curl = $this->getMockBuilder(Curl::class)->disableOriginalConstructor()->getMock();
        $curl->method('response')->willReturn(json_encode($result));
        
        $actionSchema = SchemaContainer::getAction(new CompanyHubspot, 'getAll');

        /**
         * @var CurlInterface $curl
         */
        $response = new Response($curl, $actionSchema, $this->requestInfoObject);
      
        $this->assertTrue($response->empty());
    }

    public function testIfGetMagicCatchAfterIsCorrect()
    {
        $response = new Response($this->curl, $this->actionSchema, $this->requestInfoObject);

        $this->assertEquals($response->getAfter(), 100);
    }


    public function testIfGetMagicUnknowPropertyThrowException()
    {
        $response = new Response($this->curl, $this->actionSchema, $this->requestInfoObject);

        $this->expectException(HubspotApiException::class);

        $response->unknowProperty;
    }

    public function testIftoArrayMethodIsCorrect()
    {
        $response = new Response($this->curl, $this->actionSchema, $this->requestInfoObject);

        $this->assertEquals($response->toArray(), $this->result);
    }

    public function testIfGetUrlAndHideApiMethodIsCorrect()
    {
        $response = new Response($this->curl, $this->actionSchema, $this->requestInfoObject);

        $this->assertEquals(
            $response->getUri(),
            'https://test.com/api?hapikey=xxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx'
        );
    }

    public function testIfGetStatusMethodIsCorrect()
    {
        $response = new Response($this->curl, $this->actionSchema, $this->requestInfoObject);

        $this->assertEquals(
            $response->getStatus(),
            400
        );
    }


    public function testIfGetHeadersMethodIsCorrect()
    {
        $response = new Response($this->curl, $this->actionSchema, $this->requestInfoObject);

        $this->assertEquals(
            $response->getHeaders(),
            ['Content-Type' => 'application/json;charset=utf-8']
        );
    }

    public function testIfHasErrorsMethodIsCorrect()
    {
        $response = new Response($this->curl, $this->actionSchema, $this->requestInfoObject);
     
        $this->assertEquals(
            $response->hasErrors(),
            true
        );
    }
}
