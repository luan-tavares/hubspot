<?php

namespace LTL\Hubspot\Tests\Response;

use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Response\RequestInfoObject;
use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Core\Schema\Interfaces\ActionSchemaInterface;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Resources\V3\CompanyHubspot;
use LTL\Hubspot\Resources\V4\AssociationHubspot;
use PHPUnit\Framework\TestCase;

class ResponseDataTest extends TestCase
{
    private CurlInterface $curl;

    private array $result = [
        'a' => 'b',
        'results' => [
            [
                'typeId' => 5,
                'label' => 'test_ssslabel',
                'category' => 'HUBSPOT_DEFINED'
            ],
            [
                'typeId' => 15,
                'label' => 'test_label',
                'category' => 'HUBSPOT_DEFINED'
            ]
        ],
        'paging' => [
            'next' => [
                'after' => 123456
            ]
        ]
    ];

    private RequestInfoObject $requestInfoObject;

    private array $oneResult = [
        'id' => 123,
        'createdAt' => '111',
        'updatedAt' => '111',
        'archived' => false,
        'properties' => [
            'a' => 1
        ]
    ];

    private ActionSchemaInterface $actionSchema;

    protected function setUp(): void
    {
        $this->requestInfoObject = new RequestInfoObject([
            'hasObject' => true
        ]);

        $curl = $this->getMockBuilder(CurlInterface::class)->disableOriginalConstructor()->getMock();
        $curl->method('response')->willReturn(json_encode($this->result));
        $curl->method('status')->willReturn(200);
        $curl->method('uri')->willReturn('');
        $curl->method('headers')->willReturn(null);
        $curl->method('error')->willReturn(false);

        $this->curl = $curl;

        $this->actionSchema = SchemaContainer::getAction(new AssociationHubspot, 'getDefinition');
    }


    public function testIfIterableObjectIsCorrect()
    {
        $response = new Response($this->curl, $this->actionSchema, $this->requestInfoObject);
       
  
        $return = [];
        
        foreach ($response as $data) {
            $return[] = $data->typeId;
        }

        $expected = [
            5,
            15
        ];
      
        $this->assertEquals($expected, $return);
    }

    public function testIfCountableObjectIsCorrect()
    {
        $response = new Response($this->curl, $this->actionSchema, $this->requestInfoObject);

        $this->assertEquals(count($this->result['results']), count($response));
    }

    public function testIfJsonSerializableResponseDataIsCorrect()
    {
        $response = new Response($this->curl, $this->actionSchema, $this->requestInfoObject);

        $this->assertEquals(
            json_encode($this->result),
            json_encode($response)
        );
    }

    public function testIftoArrayResponseDataIsCorrect()
    {
        $response = new Response($this->curl, $this->actionSchema, $this->requestInfoObject);

        $this->assertEquals(
            $response->toArray(),
            $this->result
        );
    }

    public function testIfGetAfterIsCorrect()
    {
        $result = [
            'results' => [
                [
                    'id' => 1,
                    'createdAt' => 'mock',
                    'updatedAt' => 'mock',
                    'archived' => 'mock',
                    'properties' => [
                        'a' => 1
                    ]
                ],
                [
                    'id' => 2,
                    'createdAt' => 'mock',
                    'updatedAt' => 'mock',
                    'archived' => 'mock',
                    'properties' => [
                        'a' => 1
                    ]
                ]
            ],
            'paging' => [
                'next' => [
                    'after' => 123456
                ]
            ]
        ];

        $curl = $this->getMockBuilder(CurlInterface::class)->disableOriginalConstructor()->getMock();
        $curl->method('response')->willReturn(json_encode($result));

        $actionSchema = SchemaContainer::getAction(new CompanyHubspot, 'getAll');

        /** @var CurlInterface $curl */
        $response = new Response($curl, $actionSchema, $this->requestInfoObject);
       
        $this->assertEquals(
            $result['paging']['next']['after'],
            $response->getAfter()
        );
    }

    public function testIfGetMagicMethodResponseDataIsCorrect()
    {
        $curl = $this->getMockBuilder(CurlInterface::class)->disableOriginalConstructor()->getMock();
        $curl->method('response')->willReturn(json_encode($this->oneResult));

        $actionSchema = SchemaContainer::getAction(new CompanyHubspot, 'get');

        /** @var CurlInterface $curl */
        $response = new Response($curl, $actionSchema, $this->requestInfoObject);
       
        $this->assertEquals(
            $this->oneResult['id'],
            $response->id
        );
    }

    public function testIfIsSetMagicMethodResponseDataIsCorrect()
    {
        $curl = $this->getMockBuilder(CurlInterface::class)->disableOriginalConstructor()->getMock();
        $curl->method('response')->willReturn(json_encode($this->oneResult));

        $actionSchema = SchemaContainer::getAction(new CompanyHubspot, 'get');

        /** @var CurlInterface $curl */
        $response = new Response($curl, $actionSchema, $this->requestInfoObject);
       
        $this->assertTrue(isset($response->id));
    }

    public function testIfNotIterableResponseDataThrowException()
    {
        $curl = $this->getMockBuilder(CurlInterface::class)->disableOriginalConstructor()->getMock();
        $curl->method('response')->willReturn(json_encode($this->oneResult));

        $actionSchema = SchemaContainer::getAction(new CompanyHubspot, 'get');

        /** @var CurlInterface $curl */
        $response = new Response($curl, $actionSchema, $this->requestInfoObject);

        $responseError = mb_strimwidth(json_encode($this->oneResult), 0, 150, ' ...');

        $this->expectExceptionMessage(
            "Resource response is not iterable or countable:\n\n{$responseError}\n\n"
        );

        foreach ($response as $value) {
        }
    }

    public function testIfNotCountableResponseDataThrowHubspotApiException()
    {
        $curl = $this->getMockBuilder(CurlInterface::class)->disableOriginalConstructor()->getMock();
        $curl->method('response')->willReturn(json_encode($this->oneResult));

        $actionSchema = SchemaContainer::getAction(new CompanyHubspot, 'get');

        /** @var CurlInterface $curl */
        $response = new Response($curl, $actionSchema, $this->requestInfoObject);

        $this->expectException(HubspotApiException::class);

        count($response);
    }

    public function testIfNotCountableResponseDataThrowExceptionMessage()
    {
        $curl = $this->getMockBuilder(CurlInterface::class)->disableOriginalConstructor()->getMock();
        $curl->method('response')->willReturn(json_encode($this->oneResult));

        $actionSchema = SchemaContainer::getAction(new CompanyHubspot, 'get');

        /** @var CurlInterface $curl */
        $response = new Response($curl, $actionSchema, $this->requestInfoObject);

        $responseError = mb_strimwidth(json_encode($this->oneResult), 0, 150, ' ...');

        $this->expectExceptionMessage(
            "Resource response is not iterable or countable:\n\n{$responseError}\n\n"
        );

        count($response);
    }

    public function testIfArrayResponseTransformInObject()
    {
        $response = new Response($this->curl, $this->actionSchema, $this->requestInfoObject);

        $result = [];
        foreach ($response as $value) {
            $result[] = $value->typeId;
        }
       
        $this->assertEquals(
            $result,
            [5, 15]
        );
    }

    public function testIfCommomStringTransformEmptyArray()
    {
        $curl = $this->getMockBuilder(CurlInterface::class)->disableOriginalConstructor()->getMock();
        $curl->method('response')->willReturn('Not Found');
        $curl->method('error')->willReturn(true);

        $actionSchema = SchemaContainer::getAction(new CompanyHubspot, 'get');

        /**
         * @var CurlInterface $curl
         */
        $response = new Response($curl, $actionSchema, $this->requestInfoObject);
       
        $this->assertEquals($response->toArray(), []);
    }

    public function testIfMagicGetMethodReturnException()
    {
        $curl = $this->getMockBuilder(CurlInterface::class)->disableOriginalConstructor()->getMock();
        $curl->method('response')->willReturn('Not Found');
        $curl->method('error')->willReturn(true);

        $actionSchema = SchemaContainer::getAction(new CompanyHubspot, 'get');

        /**
         * @var CurlInterface $curl
         */
        $response = new Response($curl, $actionSchema, $this->requestInfoObject);

        $this->expectException(HubspotApiException::class);
       
        $response->anotherProperty;
    }

    public function testIfIssetMagicMethodIsFalseIfResponseIsNull()
    {
        $curl = $this->getMockBuilder(CurlInterface::class)->disableOriginalConstructor()->getMock();
        $curl->method('response')->willReturn('Not Found');
        $curl->method('error')->willReturn(true);

        $actionSchema = SchemaContainer::getAction(new CompanyHubspot, 'get');

        /**
         * @var CurlInterface $curl
         */
        $response = new Response($curl, $actionSchema, $this->requestInfoObject);
       
        $this->assertFalse(isset($response->anotherProperty));
    }
}
