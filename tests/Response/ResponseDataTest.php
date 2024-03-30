<?php

namespace LTL\Hubspot\Tests\Response;

use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Schema\Interfaces\ActionSchemaInterface;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Factories\ResponseDataFactory;
use LTL\Hubspot\Resources\V3\CompanyHubspot;
use LTL\Hubspot\Resources\V4\AssociationHubspot;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ResponseDataTest extends TestCase
{
    private MockObject $curl;

    private array $result;

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
        $this->result = [
            'a' => 'b',
            'results' => [
                [
                    'typeId' => 5,
                    'label' => 'test_label',
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

        $this->curl = $this->getMockBuilder(CurlInterface::class)->disableOriginalConstructor()->getMock();
        $this->curl->method('response')->willReturn(json_encode($this->result));

        $this->actionSchema = SchemaContainer::getAction(new AssociationHubspot, 'getDefinition');
    }


    public function testIfIterableObjectIsCorrect()
    {
        /** @var CurlInterface $curl */
        $curl = $this->curl;

        $responseData = ResponseDataFactory::build($this->actionSchema, $curl);
  
        $return = [];

        foreach ($responseData as $data) {
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
        /** @var CurlInterface $curl */
        $curl = $this->curl;

        $responseData = ResponseDataFactory::build($this->actionSchema, $curl);

        $this->assertEquals(count($this->result['results']), count($responseData));
    }

    public function testIfJsonSerializableResponseDataIsCorrect()
    {
        /** @var CurlInterface $curl */
        $curl = $this->curl;

        $responseData = ResponseDataFactory::build($this->actionSchema, $curl);

        $this->assertEquals(
            json_encode($this->result),
            json_encode($responseData)
        );
    }

    public function testIftoArrayResponseDataIsCorrect()
    {
        /** @var CurlInterface $curl */
        $curl = $this->curl;

        $responseData = ResponseDataFactory::build($this->actionSchema, $curl);

        $this->assertEquals(
            $responseData->toArray(),
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
        $responseData = ResponseDataFactory::build($actionSchema, $curl);
       
        $this->assertEquals(
            $result['paging']['next']['after'],
            $responseData->getAfter()
        );
    }

    public function testIfGetMagicMethodResponseDataIsCorrect()
    {
        $curl = $this->getMockBuilder(CurlInterface::class)->disableOriginalConstructor()->getMock();
        $curl->method('response')->willReturn(json_encode($this->oneResult));

        $actionSchema = SchemaContainer::getAction(new CompanyHubspot, 'get');

        /** @var CurlInterface $curl */
        $responseData = ResponseDataFactory::build($actionSchema, $curl);
       
        $this->assertEquals(
            $this->oneResult['id'],
            $responseData->id
        );
    }

    public function testIfIsSetMagicMethodResponseDataIsCorrect()
    {
        $curl = $this->getMockBuilder(CurlInterface::class)->disableOriginalConstructor()->getMock();
        $curl->method('response')->willReturn(json_encode($this->oneResult));

        $actionSchema = SchemaContainer::getAction(new CompanyHubspot, 'get');

        /** @var CurlInterface $curl */
        $responseData = ResponseDataFactory::build($actionSchema, $curl);
       
        $this->assertTrue(isset($responseData->id));
    }

    public function testIfNotIterableResponseDataThrowException()
    {
        $curl = $this->getMockBuilder(CurlInterface::class)->disableOriginalConstructor()->getMock();
        $curl->method('response')->willReturn(json_encode($this->oneResult));

        $actionSchema = SchemaContainer::getAction(new CompanyHubspot, 'get');

        /** @var CurlInterface $curl */
        $responseData = ResponseDataFactory::build($actionSchema, $curl);

        $response = mb_strimwidth(json_encode($this->oneResult), 0, 150, ' ...');

        $this->expectExceptionMessage(
            "Resource response is not iterable or countable:\n\n{$response}\n\n"
        );

        foreach ($responseData as $value) {
        }
    }

    public function testIfNotCountableResponseDataThrowHubspotApiException()
    {
        $curl = $this->getMockBuilder(CurlInterface::class)->disableOriginalConstructor()->getMock();
        $curl->method('response')->willReturn(json_encode($this->oneResult));

        $actionSchema = SchemaContainer::getAction(new CompanyHubspot, 'get');

        /** @var CurlInterface $curl */
        $responseData = ResponseDataFactory::build($actionSchema, $curl);

        $this->expectException(HubspotApiException::class);

        count($responseData);
    }

    public function testIfNotCountableResponseDataThrowExceptionMessage()
    {
        $curl = $this->getMockBuilder(CurlInterface::class)->disableOriginalConstructor()->getMock();
        $curl->method('response')->willReturn(json_encode($this->oneResult));

        $actionSchema = SchemaContainer::getAction(new CompanyHubspot, 'get');

        /** @var CurlInterface $curl */
        $responseData = ResponseDataFactory::build($actionSchema, $curl);

        $responseSlice = mb_strimwidth(json_encode($this->oneResult), 0, 150, ' ...');

        $this->expectExceptionMessage(
            "Resource response is not iterable or countable:\n\n{$responseSlice}\n\n"
        );

        count($responseData);
    }

    public function testIfArrayResponseTransformInObject()
    {
        /** @var CurlInterface $curl */
        $curl = $this->curl;

        $responseData = ResponseDataFactory::build($this->actionSchema, $curl);

        $result = [];
        foreach ($responseData as $value) {
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
        $responseData = ResponseDataFactory::build($actionSchema, $curl);
       
        $this->assertEquals($responseData->toArray(), []);
    }

    public function testIfMagicGetMethodReturnNullIfResponseIsNull()
    {
        $curl = $this->getMockBuilder(CurlInterface::class)->disableOriginalConstructor()->getMock();
        $curl->method('response')->willReturn('Not Found');
        $curl->method('error')->willReturn(true);

        $actionSchema = SchemaContainer::getAction(new CompanyHubspot, 'get');

        /**
         * @var CurlInterface $curl
         */
        $responseData = ResponseDataFactory::build($actionSchema, $curl);
       
        $this->assertNull($responseData->anotherProperty);
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
        $responseData = ResponseDataFactory::build($actionSchema, $curl);
       
        $this->assertFalse(isset($responseData->anotherProperty));
    }
}
