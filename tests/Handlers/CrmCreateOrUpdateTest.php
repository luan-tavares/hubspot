<?php

namespace LTL\Hubspot\Tests\Handlers;

use LTL\Curl\Curl;
use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Builder;
use LTL\Hubspot\Core\BuilderInterface;
use LTL\Hubspot\Core\Handlers\CrmCreateOrUpdate\CrmCreateOrUpdateHandler;
use LTL\Hubspot\Core\Request\Request;
use LTL\Hubspot\Core\Response\RequestInfoObject;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Factories\RequestFactory;
use LTL\Hubspot\Factories\ResourceFactory;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use PHPUnit\Framework\TestCase;

class CrmCreateOrUpdateTest extends TestCase
{
    private RequestInfoObject $requestInfoObject;

    protected function setUp(): void
    {
        $this->requestInfoObject = new RequestInfoObject([
            'hasObject' => false
        ]);
    }

    public function testIfCrmCreateOrUpdateHandlerNameIsCorrect()
    {
        $baseResource = new ContactHubspot;
        $actionSchema = SchemaContainer::getAction($baseResource, 'createOrUpdate');

        $this->assertEquals('create_or_update', $actionSchema->handler);
    }

    public function testIfHandlerUseCreateISCorrect()
    {
        $result = [
            'id' => 222,
            'message' => 'id 5'
        ];

        $baseResource = new ContactHubspot;

        $curl = $this->getMockBuilder(Curl::class)->getMock();
        $curl->method('response')->willReturn(json_encode($result));
        $curl->method('status')->willReturn(404);

 
        $actionSchema = SchemaContainer::getAction($baseResource, 'create');
     
        /**
         * @var CurlInterface $curl
         */
        $resourceCreate = ResourceFactory::build($actionSchema, $curl, $this->requestInfoObject);

        $request = RequestFactory::build($baseResource);

        $builder = $this->getMockBuilder(Builder::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['request', '__call'])
            ->getMock();

        $builder->method('request')->willReturn($request);

        $requestBody = ['properties'=>['name' => 'Lorem']];

        $map = [
            ['withRequestException', [false], $builder],
            ['create', [$requestBody], $resourceCreate],
            ['update', [5, $requestBody], $resourceCreate]
        ];

        $builder->expects($this->exactly(4))->method('__call')->willReturnOnConsecutiveCalls()->willReturnMap($map);
 
        /**
         * @var BuilderInterface $builder
         */
        CrmCreateOrUpdateHandler::handle(
            $builder,
            $requestBody
        );

    }

    public function testIfHandlerThrowException()
    {
        $result = [
            'id' => 1
        ];

        $baseResource = new ContactHubspot;
        /**
         * @var BuilderInterface $builder
         */
        $builder = $baseResource->withRequestException();
 
        $curl = $this->getMockBuilder(CurlInterface::class)->getMock();
        $curl->method('response')->willReturn(json_encode($result));
        $curl->method('status')->willReturn(404);

        $actionSchema = SchemaContainer::getAction($baseResource, 'create');

        /**
         * @var CurlInterface $curl
         */
        $resourceResponse = ResourceFactory::build($actionSchema, $curl, $this->requestInfoObject);
 
        $requestBody = ['properties'=>['email' => 'lorem@ipsum.com']];

        $mockBuilder = $this->getMockBuilder(Builder::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['request', '__call'])
            ->getMock();

        $map = [
            ['withRequestException', [false], $mockBuilder],
            ['create', [$requestBody], $resourceResponse],
            ['update', [1 ,$requestBody], $resourceResponse]
        ];

        $mockBuilder->method('request')->willReturn($builder->request());
        $mockBuilder->method('__call')->willReturnMap($map);

        $this->expectException(HubspotApiException::class);

        /**
         * @var BuilderInterface $mockBuilder
         */
        CrmCreateOrUpdateHandler::handle(
            $mockBuilder,
            $requestBody,
            1
        );
    }

    public function testIfHandlerUseUpdateISCorrect()
    {
        $result = [
            'id' => 1
        ];

        $baseResource = new ContactHubspot;

        $curl = $this->getMockBuilder(Curl::class)->getMock();
        $curl->method('response')->willReturn(json_encode($result));
        $curl->method('status')->willReturn(200);

        $actionSchema = SchemaContainer::getAction($baseResource, 'update');
        /**
         * @var CurlInterface $curl
         */
        $resource = ResourceFactory::build($actionSchema, $curl, $this->requestInfoObject);

        $request = RequestFactory::build($baseResource);

        $builder = $this->getMockBuilder(Builder::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['request', '__call'])
            ->getMock();

        $builder->method('request')->willReturn($request);
        $builder->expects($this->once())->method('__call')->willReturn($resource);

        /**
         * @var BuilderInterface $builder
         */
        CrmCreateOrUpdateHandler::handle(
            $builder,
            ['properties'=>['name' => 'Lorem']],
            1
        );
    }

    public function testIfChangeExceptionOnRequestErrorToFalse()
    {
        $result = [
            'id' => 1,
            'message' => 'error'
        ];

        $baseResource = new ContactHubspot;
 
        $curl = $this->getMockBuilder(CurlInterface::class)->getMock();
        $curl->method('response')->willReturn(json_encode($result));
        $curl->method('status')->willReturn(404);
        $curl->method('error')->willReturn(true);

        $actionSchema = SchemaContainer::getAction($baseResource, 'create');
        
        /**
         * @var CurlInterface $curl
         */
        $resource = ResourceFactory::build($actionSchema, $curl, $this->requestInfoObject);
 
        $requestBody = ['properties'=>['email' => 'lorem@ipsum.com']];

        $mockBuilder = $this->getMockBuilder(Builder::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['request', '__call'])
            ->getMock();

        $mockRequest = $this->getMockBuilder(Request::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['removeException', 'hasWithRequestException'])
            ->getMock();

        $map = [
            ['withRequestException', [false], $mockBuilder],
            ['create', [$requestBody], $resource],
            ['update', [1 ,$requestBody], $resource]
        ];

        $mockBuilder->method('request')->willReturn($mockRequest);
        $mockBuilder->method('__call')->willReturnMap($map);

        $mockRequest->expects($this->once(1))->method('removeException');

        /**
         * @var BuilderInterface $mockBuilder
         */
        CrmCreateOrUpdateHandler::handle(
            $mockBuilder,
            $requestBody,
            1
        );
    }

    public function testIfMatchNewIdInMessage()
    {
        $resourceMock = $this->getMockBuilder(ContactHubspot::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['__get', 'status', 'error'])
            ->getMock();

        $getMap = [
            ['message', 'id 555 n']
        ];

        $resourceMock->method('__get')->willReturnMap($getMap);
        $resourceMock->method('status')->willReturn(404);
        $resourceMock->method('error')->willReturn(true);

        $request = RequestFactory::build(new ContactHubspot);

        $builderMock = $this->getMockBuilder(Builder::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['request', '__call'])
            ->getMock();
      

        $requestBody = ['properties'=>['name' => 'Lorem']];

        $map = [
            'withRequestException' => $builderMock,
            'create' => $resourceMock,
            'update' => $resourceMock,
        ];

        $update = 0;

        $builderMock->method('request')->willReturn($request);
        $builderMock->method('__call')->willReturnCallback(function (...$params) use (&$update, $map) {
            $method = current($params);

            if($method === 'update') {
                $update++;
            }
            
            return $map[$method];
        });
 
        /**
         * @var BuilderInterface $builderMock
         */
        CrmCreateOrUpdateHandler::handle(
            $builderMock,
            $requestBody
        );

        $this->assertEquals(1, $update);

    }
}
