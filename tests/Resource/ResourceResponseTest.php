<?php

namespace LTL\Hubspot\Tests\Resource;

use LTL\Curl\Curl;
use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;
use LTL\Hubspot\Core\Response\RequestInfoObject;
use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Factories\ResourceFactory;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use LTL\Hubspot\Resources\V4\AssociationHubspot;
use PHPUnit\Framework\TestCase;

class ResourceResponseTest extends TestCase
{
    private ResourceInterface $resource;

    private array $result = [
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

    private RequestInfoObject $requestInfoObject;

    protected function setUp(): void
    {
        $curl = $this->getMockBuilder(Curl::class)->disableOriginalConstructor()->getMock();
        $curl->method('status')->willReturn(202);
        $curl->method('response')->willReturn(json_encode($this->result));
        $curl->method('uri')->willReturn('https://test.com/api?hapikey=12345678-1234-1234-1234-abcde1234567');
        $curl->method('headers')->willReturn(['Content-Type' => 'application/json;charset=utf-8']);

        $this->requestInfoObject = new RequestInfoObject([
            'hasObject' => false
        ]);
        
        $actionSchema = SchemaContainer::getAction(new AssociationHubspot, 'getDefinition');

        /**
         * @var CurlInterface $curl
         */
        $this->resource = ResourceFactory::build($actionSchema, $curl, $this->requestInfoObject);
    }


    public function testToArrayMethodIsCorrect()
    {
        $this->assertEquals($this->resource->toArray(), $this->result);
    }

    public function testToArrayMethodThrowExceptionIfCallBeforeRequest()
    {
        $this->resource = new AssociationHubspot;

        $this->expectExceptionMessage(
            $this->resource::class ."::toArray() must not be used before actions:\n\n". SchemaContainer::get($this->resource)
        );
      
        $this->resource->toArray();
    }

    public function testToJsonMethodIsCorrect()
    {
        
      
        $this->assertEquals($this->resource->toJson(), json_encode($this->result));
    }

    public function testToJsonMethodThrowExceptionIfCallBeforeRequest()
    {
        $this->resource = new AssociationHubspot;

        $this->expectExceptionMessage(
            $this->resource::class ."::toJson() must not be used before actions:\n\n". SchemaContainer::get($this->resource)
        );
      
        $this->resource->toJson();
    }

    public function testStatusMethodIsCorrect()
    {
        
      
        $this->assertEquals($this->resource->status(), 202);
    }

    public function testStatusMethodThrowExceptionIfCallBeforeRequest()
    {
        $this->resource = new AssociationHubspot;

        $this->expectExceptionMessage(
            $this->resource::class ."::status() must not be used before actions:\n\n". SchemaContainer::get($this->resource)
        );
      
        $this->resource->status();
    }

    public function testHeadersMethodIsCorrect()
    {
        
      
        $this->assertEquals($this->resource->headers(), ['Content-Type' => 'application/json;charset=utf-8']);
    }

    public function testHeadersMethodThrowExceptionIfCallBeforeRequest()
    {
        $this->resource = new AssociationHubspot;

        $this->expectExceptionMessage(
            $this->resource::class ."::headers() must not be used before actions:\n\n". SchemaContainer::get($this->resource)
        );
      
        $this->resource->headers();
    }

    public function testErrorMethodWith199StatusIsTrue()
    {
        $curl = $this->getMockBuilder(Curl::class)->disableOriginalConstructor()->getMock();
        $curl->method('status')->willReturn(199);

        $actionSchema = SchemaContainer::getAction(new ContactHubspot, 'getAll');

        /**
         * @var CurlInterface $curl
         */
        $object = ResourceFactory::build($actionSchema, $curl, $this->requestInfoObject);
  
        $this->assertTrue($object->error());
    }

    public function testErrorMethodWith200StatusIsFalse()
    {
        $curl = $this->getMockBuilder(Curl::class)->disableOriginalConstructor()->getMock();
        $curl->method('status')->willReturn(200);
      
        $actionSchema = SchemaContainer::getAction(new ContactHubspot, 'getAll');

        /**
         * @var CurlInterface $curl
         */
        $object = ResourceFactory::build($actionSchema, $curl, $this->requestInfoObject);

   
        $this->assertFalse($object->error());
    }

    public function testErrorMethodWith202StatusIsFalse()
    {
        $curl = $this->getMockBuilder(Curl::class)->disableOriginalConstructor()->getMock();
        $curl->method('status')->willReturn(202);
        $curl->method('error')->willReturn(false);
      
        $actionSchema = SchemaContainer::getAction(new ContactHubspot, 'getAll');

        /**
         * @var CurlInterface $curl
         */
        $object = ResourceFactory::build($actionSchema, $curl, $this->requestInfoObject);
 
        $this->assertFalse($object->error());
    }

    public function testErrorMethodWith300StatusIsTrue()
    {
        $curl = $this->getMockBuilder(Curl::class)->disableOriginalConstructor()->getMock();
        $curl->method('status')->willReturn(300);
      
        $actionSchema = SchemaContainer::getAction(new ContactHubspot, 'getAll');

        /**
         * @var CurlInterface $curl
         */
        $object = ResourceFactory::build($actionSchema, $curl, $this->requestInfoObject);
 
        $this->assertTrue($object->error());
    }

    public function testErrorMethodWith404StatusIsTrue()
    {
        $curl = $this->getMockBuilder(Curl::class)->disableOriginalConstructor()->getMock();
        $curl->method('status')->willReturn(404);
      
        $actionSchema = SchemaContainer::getAction(new ContactHubspot, 'getAll');

        /**
         * @var CurlInterface $curl
         */
        $object = ResourceFactory::build($actionSchema, $curl, $this->requestInfoObject);
  
        $this->assertTrue($object->error());
    }

    public function testErrorMethodThrowExceptionIfCallBeforeRequest()
    {
        $this->resource = new AssociationHubspot;

        $this->expectExceptionMessage(
            $this->resource::class ."::error() must not be used before actions:\n\n". SchemaContainer::get($this->resource)
        );
      
        $this->resource->error();
    }

    public function testIfMultiStatusISCorrect()
    {
        $curl = $this->getMockBuilder(Curl::class)->disableOriginalConstructor()->getMock();
        $curl->method('status')->willReturn(HubspotConfig::MULTI_STATUS_CODE);
      
        $actionSchema = SchemaContainer::getAction(new ContactHubspot, 'getAll');

        /**
         * @var CurlInterface $curl
         */
        $object = ResourceFactory::build($actionSchema, $curl, $this->requestInfoObject);
  
        $this->assertTrue($object->isMultiStatus());
    }


    public function testInvalidEmailMethodThrowExceptionIfCallBeforeRequest()
    {
        $this->resource = new AssociationHubspot;

        $this->expectException(HubspotApiException::class);
      
        $this->resource->invalidEmailError();
    }

    public function testInvalidEmailMethodAnaliseString()
    {
        $curl = $this->getMockBuilder(Curl::class)->disableOriginalConstructor()->getMock();
        $curl->method('response')->willReturn('teste INVALID_EMAIL 123');
      
        $actionSchema = SchemaContainer::getAction(new ContactHubspot, 'getAll');

        /**
         * @var CurlInterface $curl
         */
        $object = ResourceFactory::build($actionSchema, $curl, $this->requestInfoObject);
  
        $this->assertTrue($object->invalidEmailError());
    }

    public function testMultiStatusMethodThrowExceptionIfCallBeforeRequest()
    {
        $this->resource = new AssociationHubspot;

        $this->expectException(HubspotApiException::class);
      
        $this->resource->isMultiStatus();
    }

    public function testIfTooManyRequestsErrorStatusISCorrect()
    {
        $curl = $this->getMockBuilder(Curl::class)->disableOriginalConstructor()->getMock();
        $curl->method('status')->willReturn(HubspotConfig::TOO_MANY_REQUESTS_ERROR_CODE);
      
        $actionSchema = SchemaContainer::getAction(new ContactHubspot, 'getAll');

        /**
         * @var CurlInterface $curl
         */
        $object = ResourceFactory::build($actionSchema, $curl, $this->requestInfoObject);
  
        $this->assertTrue($object->isTooManyRequestsError());
    }

    public function testIfTooManyRequestsErrorWithResponseNullThrowException()
    {
        $this->resource = new AssociationHubspot;

        $this->expectException(HubspotApiException::class);
      
        $this->resource->isTooManyRequestsError();
    }
}
