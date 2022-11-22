<?php

namespace LTL\Hubspot\Tests\Resource;

use LTL\Curl\Curl;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;
use LTL\Hubspot\Core\Interfaces\Response\ResponseInterface;
use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Factories\ResourceFactory;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use LTL\Hubspot\Resources\V4\AssociationHubspot;
use PHPUnit\Framework\TestCase;

class ResourceResponseTest extends TestCase
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


    public function testToArrayMethodIsCorrect()
    {
        $resource = ResourceFactory::build($this->baseResource, $this->response);
      
        $this->assertEquals($resource->toArray(), $this->result);
    }

    public function testToArrayMethodThrowExceptionIfCallBeforeRequest()
    {
        $resource = new AssociationHubspot;

        $this->expectExceptionMessage(
            $resource::class ."::toArray() must not be used before actions:\n\n". SchemaContainer::get($resource)
        );
      
        $resource->toArray();
    }

    public function testToJsonMethodIsCorrect()
    {
        $resource = ResourceFactory::build($this->baseResource, $this->response);
      
        $this->assertEquals($resource->toJson(), json_encode($this->result));
    }

    public function testToJsonMethodThrowExceptionIfCallBeforeRequest()
    {
        $resource = new AssociationHubspot;

        $this->expectExceptionMessage(
            $resource::class ."::toJson() must not be used before actions:\n\n". SchemaContainer::get($resource)
        );
      
        $resource->toJson();
    }

    public function testStatusMethodIsCorrect()
    {
        $resource = ResourceFactory::build($this->baseResource, $this->response);
      
        $this->assertEquals($resource->status(), 202);
    }

    public function testStatusMethodThrowExceptionIfCallBeforeRequest()
    {
        $resource = new AssociationHubspot;

        $this->expectExceptionMessage(
            $resource::class ."::status() must not be used before actions:\n\n". SchemaContainer::get($resource)
        );
      
        $resource->status();
    }

    public function testDocumentationMethodIsCorrect()
    {
        $resource = ResourceFactory::build($this->baseResource, $this->response);
      
        $this->assertEquals($resource->documentation(), 'https://developers.hubspot.com/docs/api/crm/associations/v4');
    }

    public function testDocumentationMethodThrowExceptionIfCallBeforeRequest()
    {
        $resource = new AssociationHubspot;

        $this->expectExceptionMessage(
            $resource::class ."::documentation() must not be used before actions:\n\n". SchemaContainer::get($resource)
        );
      
        $resource->documentation();
    }

    public function testHeadersMethodIsCorrect()
    {
        $resource = ResourceFactory::build($this->baseResource, $this->response);
      
        $this->assertEquals($resource->headers(), ['Content-Type' => 'application/json;charset=utf-8']);
    }

    public function testHeadersMethodThrowExceptionIfCallBeforeRequest()
    {
        $resource = new AssociationHubspot;

        $this->expectExceptionMessage(
            $resource::class ."::headers() must not be used before actions:\n\n". SchemaContainer::get($resource)
        );
      
        $resource->headers();
    }

    public function testErrorMethodWith199StatusIsTrue()
    {
        $curl = $this->getMockBuilder(Curl::class)->disableOriginalConstructor()->getMock();
        $curl->method('status')->willReturn(199);
      
        $resource = new ContactHubspot;

        $actionSchema = SchemaContainer::getAction($resource, 'getAll');


        $object = ResourceFactory::build($resource, new Response($curl, $actionSchema));

   
        $this->assertTrue($object->error());
    }

    public function testErrorMethodWith200StatusIsFalse()
    {
        $curl = $this->getMockBuilder(Curl::class)->disableOriginalConstructor()->getMock();
        $curl->method('status')->willReturn(200);
      
        $resource = new ContactHubspot;

        $actionSchema = SchemaContainer::getAction($resource, 'getAll');


        $object = ResourceFactory::build($resource, new Response($curl, $actionSchema));

   
        $this->assertFalse($object->error());
    }

    public function testErrorMethodWith202StatusIsFalse()
    {
        $curl = $this->getMockBuilder(Curl::class)->disableOriginalConstructor()->getMock();
        $curl->method('status')->willReturn(202);
      
        $resource = new ContactHubspot;

        $actionSchema = SchemaContainer::getAction($resource, 'getAll');


        $object = ResourceFactory::build($resource, new Response($curl, $actionSchema));

   
        $this->assertFalse($object->error());
    }

    public function testErrorMethodWith300StatusIsTrue()
    {
        $curl = $this->getMockBuilder(Curl::class)->disableOriginalConstructor()->getMock();
        $curl->method('status')->willReturn(300);
      
        $resource = new ContactHubspot;

        $actionSchema = SchemaContainer::getAction($resource, 'getAll');


        $object = ResourceFactory::build($resource, new Response($curl, $actionSchema));

   
        $this->assertTrue($object->error());
    }

    public function testErrorMethodWith404StatusIsTrue()
    {
        $curl = $this->getMockBuilder(Curl::class)->disableOriginalConstructor()->getMock();
        $curl->method('status')->willReturn(404);
      
        $resource = new ContactHubspot;

        $actionSchema = SchemaContainer::getAction($resource, 'getAll');


        $object = ResourceFactory::build($resource, new Response($curl, $actionSchema));

   
        $this->assertTrue($object->error());
    }

    public function testErrorMethodThrowExceptionIfCallBeforeRequest()
    {
        $resource = new AssociationHubspot;

        $this->expectExceptionMessage(
            $resource::class ."::error() must not be used before actions:\n\n". SchemaContainer::get($resource)
        );
      
        $resource->error();
    }

    public function testIfMultiStatusISCorrect()
    {
        $curl = $this->getMockBuilder(Curl::class)->disableOriginalConstructor()->getMock();
        $curl->method('status')->willReturn(HubspotConfig::MULTI_STATUS_CODE);
      
        $resource = new ContactHubspot;

        $actionSchema = SchemaContainer::getAction($resource, 'getAll');


        $object = ResourceFactory::build($resource, new Response($curl, $actionSchema));

   
        $this->assertTrue($object->multiStatus());
    }


    public function testMultiStatusMethodThrowExceptionIfCallBeforeRequest()
    {
        $resource = new AssociationHubspot;

        $this->expectException(HubspotApiException::class);
      
        $resource->multiStatus();
    }

    public function testIfTooManyRequestsErrorStatusISCorrect()
    {
        $curl = $this->getMockBuilder(Curl::class)->disableOriginalConstructor()->getMock();
        $curl->method('status')->willReturn(HubspotConfig::TOO_MANY_REQUESTS_ERROR_CODE);
      
        $resource = new ContactHubspot;

        $actionSchema = SchemaContainer::getAction($resource, 'getAll');


        $object = ResourceFactory::build($resource, new Response($curl, $actionSchema));

   
        $this->assertTrue($object->isTooManyRequestsError());
    }

    public function testIfTooManyRequestsErrorWithResponseNullThrowException()
    {
        $resource = new AssociationHubspot;

        $this->expectException(HubspotApiException::class);
      
        $resource->isTooManyRequestsError();
    }
}