<?php

namespace LTL\Hubspot\Tests\Resource;

use LTL\Curl\Curl;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;
use LTL\Hubspot\Core\Interfaces\Response\ResponseInterface;
use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Factories\ResourceFactory;
use LTL\Hubspot\Resources\AssociationHubspot;
use PHPUnit\Framework\TestCase;

class ResourceIterableTest extends TestCase
{
    private ResponseInterface|null $response;

    private ResourceInterface $baseResource;

    private array $result;

    protected function setUp(): void
    {
        $this->result = [
            'results' => [
                'a' => 4,
                'd' => ['a' => 5],
            ],
            'paging' => [
                'next' => [
                    'after' => 100
                ]
            ]
        ];

        $this->response = null;

        $curl = $this->getMockBuilder(Curl::class)->disableOriginalConstructor()->getMock();
        $curl->method('status')->willReturn(202);
        $curl->method('response')->willReturn(json_encode($this->result));
        $curl->method('uri')
            ->willReturn('https://test.com/api?hapikey=12345678-1234-1234-1234-abcde1234567');
        $curl->method('headers')->willReturn(['Content-Type' => 'application/json;charset=utf-8']);

        $this->baseResource = new AssociationHubspot;
        $actionSchema = SchemaContainer::getAction($this->baseResource, 'getDefinition');

        $this->response = new Response($curl, $actionSchema);
    }


    public function testIfIterableIsCorrect()
    {
        $resource = ResourceFactory::build($this->baseResource, $this->response);

        $return = [];

        foreach ($resource as $value) {
            $return[] = $value;
        }
      
        $this->assertEquals($return, [
            4,
            (object) ['a' => 5],
        ]);
    }

    public function testIfCountableIsCorrect()
    {
        $resource = ResourceFactory::build($this->baseResource, $this->response);
      
        $this->assertEquals(count($resource), 2);
    }

    public function testIfArrayAccessIsCorrect()
    {
        $resource = ResourceFactory::build($this->baseResource, $this->response);
      
        $this->assertEquals($resource['results'], $this->result['results']);
    }
}