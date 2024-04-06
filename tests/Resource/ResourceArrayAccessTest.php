<?php

namespace LTL\Hubspot\Tests\Resource;

use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Response\RequestInfoObject;
use LTL\Hubspot\Factories\ResourceFactory;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use LTL\Hubspot\Resources\V4\AssociationHubspot;
use PHPUnit\Framework\TestCase;

class ResourceArrayAccessTest extends TestCase
{
    private array $result;

    private AssociationHubspot $resource;

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
            ],
            'big' => array_fill(0, 150, 'TATAKAE')
        ];

        $requestInfoObject = new RequestInfoObject([
            'hasObject' => false
        ]);

        $curl = $this->getMockBuilder(CurlInterface::class)->disableOriginalConstructor()->getMock();
        $curl->method('response')->willReturn(json_encode($this->result));
               
        $actionSchema = SchemaContainer::getAction(new AssociationHubspot, 'getDefinition');

        /** @var CurlInterface $curl */
        $this->resource = ResourceFactory::build($actionSchema, $curl, $requestInfoObject);
    }


    public function testIfArrayOffsetSetNotIncludeItem()
    {

        $this->resource->offsetSet('foo', 'bar');
      
        $this->assertFalse($this->resource->offsetExists('foo'));
    }

    public function testIfArrayOffsetSetMethodIsCalled()
    {
        $resource = $this->createMock(ContactHubspot::class);

        $resource->expects($this->once())->method('offsetSet');

        $resource['foo'] = 'bar';
    }

    public function testIfArrayOffsetExistsInExistsItemIsTrue()
    {
        $this->assertTrue(isset($this->resource['results']));
    }

    public function testIfArrayOffsetExistsInNoExistsItemIsFalse()
    {
        $this->resource['teste'] = 5;
      
        $this->assertFalse(isset($this->resource['teste']));
    }

    public function testIfArrayOffsetExistsMethodInNoExistsItemIsFalse()
    {
        $this->resource['teste'] = 5;
      
        $this->assertFalse($this->resource->offsetExists('teste'));
    }

    public function testIfArrayOffsetUnsetNotDeleteItem()
    {
        unset($this->resource['results']);

        $this->resource->offsetUnset('results');
      
        $this->assertEquals($this->resource['results'], $this->result['results']);
    }

    public function testIfOffsetGetNotExistsThrownHubspotApiExecptionMessage()
    {
        $index = 'unknow';

        $response = mb_strimwidth(json_encode($this->result), 0, 150, ' ...');

        $expectedMessage = "Undefined \"{$index}\" offset in response array first level:\n\n{$response}\n\n";
       
        $this->expectExceptionMessage($expectedMessage);
      
        $this->resource[$index];
    }
}
