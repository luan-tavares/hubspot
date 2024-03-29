<?php

namespace LTL\Hubspot\Tests\Resource;

use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;
use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Factories\ResourceFactory;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use LTL\Hubspot\Resources\V4\AssociationHubspot;
use PHPUnit\Framework\TestCase;

class ResourceArrayAccessTest extends TestCase
{
    private ResponseInterface|null $response;

    private array $result;

    private ResourceInterface $baseResource;

    protected function setUp(): void
    {
        $this->result = [
            'results' => [
                'a' => 4,
                'd' => 'teste',
            ],
            'paging' => [
                'next' => [
                    'after' => 100
                ]
            ],
            'big' => array_fill(0, 150, 'TATAKAE')
        ];

        $this->response = null;

        $curl = $this->getMockBuilder(CurlInterface::class)->disableOriginalConstructor()->getMock();
        $curl->method('response')->willReturn(json_encode($this->result));

        $this->baseResource = new AssociationHubspot;
        $actionSchema = SchemaContainer::getAction($this->baseResource, 'getDefinition');

        /**
         * @var CurlInterface $curl
         */
        $this->response = new Response($curl, $actionSchema);
    }


    public function testIfArrayOffsetSetNotIncludeItem()
    {
        $resource = ResourceFactory::build($this->baseResource, $this->response);

        $resource->offsetSet('foo', 'bar');
      
        $this->assertFalse($resource->offsetExists('foo'));
    }

    public function testIfArrayOffsetSetMethodIsCalled()
    {
        $resource = $this->createMock(ContactHubspot::class);

        $resource->expects($this->once())->method('offsetSet');

        $resource['foo'] = 'bar';
    }

    public function testIfArrayOffsetExistsInExistsItemIsTrue()
    {
        $resource = ResourceFactory::build($this->baseResource, $this->response);
      
        $this->assertTrue(isset($resource['results']));
    }

    public function testIfArrayOffsetExistsInNoExistsItemIsFalse()
    {
        $resource = ResourceFactory::build($this->baseResource, $this->response);

        $resource['teste'] = 5;
      
        $this->assertFalse(isset($resource['teste']));
    }

    public function testIfArrayOffsetExistsMethodInNoExistsItemIsFalse()
    {
        $resource = ResourceFactory::build($this->baseResource, $this->response);

        $resource['teste'] = 5;
      
        $this->assertFalse($resource->offsetExists('teste'));
    }

    public function testIfArrayOffsetUnsetNotDeleteItem()
    {
        $resource = ResourceFactory::build($this->baseResource, $this->response);

        unset($resource['results']);

        $resource->offsetUnset('results');
      
        $this->assertEquals($resource['results'], $this->result['results']);
    }

    public function testIfOffsetGetNotExistsThrownHubspotApiExecptionMessage()
    {
        $resource = ResourceFactory::build($this->baseResource, $this->response);

        $index = 'unknow';

        $response = mb_strimwidth(json_encode($this->result), 0, 150, ' ...');

        $expectedMessage = "Undefined \"{$index}\" offset in response array first level:\n\n{$response}\n\n";
       
        $this->expectExceptionMessage($expectedMessage);
      
        $resource[$index];
    }
}
