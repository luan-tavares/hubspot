<?php

namespace LTL\Hubspot\Tests\Resource;

use LTL\Curl\Curl;
use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;
use LTL\Hubspot\Core\Response\RequestInfoObject;
use LTL\Hubspot\Factories\ResourceFactory;
use LTL\Hubspot\Resources\V4\AssociationHubspot;
use PHPUnit\Framework\TestCase;

class ResourceIterableTest extends TestCase
{
    private ResourceInterface $resource;

    private array $result;

    protected function setUp(): void
    {
        $this->result = [
            'results' => [
                [
                    'typeId' => 5,
                    'label' => 'test_label',
                    'category' => 'HUBSPOT_DEFINED'
                ],
                [
                    'typeId' => 5,
                    'label' => 'test_label',
                    'category' => 'HUBSPOT_DEFINED'
                ]
            ],
            'paging' => [
                'next' => [
                    'after' => 100
                ]
            ]
        ];

        $curl = $this->getMockBuilder(Curl::class)->disableOriginalConstructor()->getMock();
        $curl->method('status')->willReturn(202);
        $curl->method('response')->willReturn(json_encode($this->result));
        $curl->method('uri')
            ->willReturn('https://test.com/api?hapikey=12345678-1234-1234-1234-abcde1234567');
        $curl->method('headers')->willReturn(['Content-Type' => 'application/json;charset=utf-8']);

        $requestInfoObject = new RequestInfoObject([
            'hasObject' => false
        ]);
        
        $actionSchema = SchemaContainer::getAction(new AssociationHubspot, 'getDefinition');

        /**
         * @var CurlInterface $curl
         */
        $this->resource = ResourceFactory::build($actionSchema, $curl, $requestInfoObject);
    }


    public function testIfIterableIsCorrect()
    {
        $expected = 2;

        $return = [];

        foreach ($this->resource as $value) {
            $return[] = $value;
        }
      
        $this->assertEquals($expected, count($return));
    }

    public function testIfCountableIsCorrect()
    {
        $this->assertEquals(count($this->resource), 2);
    }

    public function testIfArrayAccessIsCorrect()
    {
        $this->assertEquals($this->resource['results'], $this->result['results']);
    }
}
