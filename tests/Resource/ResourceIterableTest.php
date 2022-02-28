<?php

namespace LTL\Hubspot\Tests\Response;

use LTL\Curl\Curl;
use LTL\Hubspot\Containers\RequestContainer;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\HubspotApikey;
use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;
use LTL\Hubspot\Core\Interfaces\Response\ResponseInterface;
use LTL\Hubspot\Core\Request\Request;
use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Factories\ResourceFactory;
use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Resources\AssociationHubspot;
use LTL\Hubspot\Resources\ContactHubspot;
use LTL\Hubspot\Resources\DealHubspot;
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
        $curl->method('getStatus')->willReturn(202);
        $curl->method('getResponse')->willReturn(json_encode($this->result));
        $curl->method('getUri')
            ->willReturn('https://test.com/api?hapikey=12345678-1234-1234-1234-abcde1234567');
        $curl->method('getHeaders')->willReturn(['Content-Type' => 'application/json;charset=utf-8']);

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

    public function testIfJsonSerializableIsCorrect()
    {
        $resource = ResourceFactory::build($this->baseResource, $this->response);
      
        $this->assertEquals(json_encode($resource), json_encode($this->result));
    }

    public function testIfGetMagicMethodIsCorrect()
    {
        $resource = ResourceFactory::build($this->baseResource, $this->response);
      
        $this->assertEquals($resource->results->a, 4);
    }

    public function testToArrayMethodIsCorrect()
    {
        $resource = ResourceFactory::build($this->baseResource, $this->response);
      
        $this->assertEquals($resource->toArray(), $this->result);
    }

    public function testToJsonMethodIsCorrect()
    {
        $resource = ResourceFactory::build($this->baseResource, $this->response);
      
        $this->assertEquals($resource->toJson(), json_encode($this->result));
    }

    public function testStatusMethodIsCorrect()
    {
        $resource = ResourceFactory::build($this->baseResource, $this->response);
      
        $this->assertEquals($resource->status(), 202);
    }

    public function testErrorMethodIsCorrect()
    {
        $resource = ResourceFactory::build($this->baseResource, $this->response);
      
        $this->assertEquals($resource->error(), false);
    }

    public function testDocumentationMethodIsCorrect()
    {
        $resource = ResourceFactory::build($this->baseResource, $this->response);
      
        $this->assertEquals($resource->documentation(), 'https://developers.hubspot.com/docs/api/crm/associations/v4');
    }

    public function testHeadersMethodIsCorrect()
    {
        $resource = ResourceFactory::build($this->baseResource, $this->response);
      
        $this->assertEquals($resource->headers(), ['Content-Type' => 'application/json;charset=utf-8']);
    }

    public function testSetGlobalApikeyMethodIsCorrect()
    {
        Hubspot::setGlobalApikey('123456');
      
        $this->assertEquals(HubspotApikey::get(), '123456');
    }

    public function testIfCallMagicMethodIsCorrect()
    {
        $builder = (new ContactHubspot)->limit(55);
      
        $this->assertEquals($builder->request()->getQueries(), [
            'hapikey' => '123456',
            'limit' => 55
        ]);
    }

    public function testIfCallStaticMagicMethodIsCorrect()
    {
        $builder = (new ContactHubspot)->listProperties('a', 'b', 'c');
      
        $this->assertEquals($builder->request()->getQueries(), [
            'hapikey' => '123456',
            'property' => ['a', 'b', 'c']
        ]);
    }

    public function testIfToStringMagicMethodIsCorrect()
    {
        $builder = (new DealHubspot)->properties('a,b,c');
   
        $this->assertEquals((string) $builder->baseResource(), 'deals-v3');
    }

    public function testIfCallToArrayBeforeRequestCallThrowsException()
    {
        $this->expectExceptionMessage(get_class($this->baseResource) ."::toArray() must not be used before actions:\n\n". SchemaContainer::get($this->baseResource));
      
        $this->baseResource->toArray();
    }

    public function testIfGetMagicMethodBeforeRequestThrowsException()
    {
        $this->expectExceptionMessage(
            "Property access must not be used before actions:\n\n". SchemaContainer::get($this->baseResource)
        );
      
        $this->baseResource->unknow;
    }
}
