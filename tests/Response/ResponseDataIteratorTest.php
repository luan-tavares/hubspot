<?php

namespace LTL\Hubspot\Tests\Response;

use LTL\Curl\Curl;
use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Schema\Interfaces\ActionSchemaInterface;
use LTL\Hubspot\Factories\ObjectFactory;
use LTL\Hubspot\Factories\ResponseDataFactory;
use LTL\Hubspot\Resources\V4\AssociationHubspot;
use PHPUnit\Framework\TestCase;

class ResponseDataIteratorTest extends TestCase
{
    private CurlInterface $curl;

    private ActionSchemaInterface $actionSchema;

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
            ]
        ];

        $curl = $this->getMockBuilder(Curl::class)->disableOriginalConstructor()->getMock();
        $curl->method('response')->willReturn(json_encode($this->result));

        $this->curl = $curl;

        $this->actionSchema = SchemaContainer::getAction(new AssociationHubspot, 'getDefinition');
    }


    public function testIfIterableIsCorrect()
    {
        $responseData = ResponseDataFactory::build($this->actionSchema, $this->curl);

        $responseData->next();

        $responseData->rewind();

        $actionSchema = SchemaContainer::getAction(new AssociationHubspot, 'getDefinition');

        $object = ObjectFactory::build((object) [
            'typeId' => 5,
            'label' => 'test_label',
            'category' => 'HUBSPOT_DEFINED'
        ], $actionSchema, false);

      
        $this->assertEquals($object, $responseData->current());
    }
}
