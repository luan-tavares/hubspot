<?php

namespace LTL\Hubspot\Tests\Request;

use LTL\Curl\Curl;
use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Builder;
use LTL\Hubspot\Core\BuilderInterface;
use LTL\Hubspot\Core\Handlers\ContactCreateOrUpdateByEmail\ContactCreateOrUpdateByEmailHandler;
use LTL\Hubspot\Core\Request\Request;
use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;
use LTL\Hubspot\Core\Response\RequestInfoObject;
use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Factories\RequestFactory;
use LTL\Hubspot\Factories\ResourceFactory;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use PHPUnit\Framework\TestCase;

class ContactCreateOrUpdateByEmailHandlerTest extends TestCase
{
    private RequestInfoObject $requestInfoObject;

    protected function setUp(): void
    {
        $this->requestInfoObject = new RequestInfoObject([
            'hasObject' => false
        ]);
    }

    public function testIfContactCreateOrUpdateByEmailHandlerTestNameIsCorrect()
    {
        $baseResource = new ContactHubspot;

        $actionSchema = SchemaContainer::getAction($baseResource, 'createOrUpdateByEmail');

        $this->assertEquals('contact_create_or_update_by_email', $actionSchema->handler);
    }

    public function testIfHandlerUseCreateISCorrect()
    {
        $result = [
            'id' => 1
        ];

        $baseResource = new ContactHubspot;
 
        $curl = $this->getMockBuilder(CurlInterface::class)->getMock();
        $curl->method('response')->willReturn(json_encode($result));
        $curl->method('status')->willReturn(404);
        
        $actionSchema = SchemaContainer::getAction($baseResource, 'create');

        /**
         * @var CurlInterface $curl
         */
        $resourceResponse = ResourceFactory::build($actionSchema, $curl, $this->requestInfoObject);

        $request = RequestFactory::build($baseResource);

        $mockBuilder = $this->getMockBuilder(Builder::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['request', '__call'])
            ->getMock();

        $requestBody = ['properties'=>['email' => 'lorem@ipsum.com']];

        $map = [
            ['create', [$requestBody], $resourceResponse]
        ];
    
        $mockBuilder->method('request')->willReturn($request);
        $mockBuilder->expects($this->exactly(2))->method('__call')->willReturnOnConsecutiveCalls()->willReturnMap($map);

        /**
         * @var BuilderInterface $mockBuilder
         */
        ContactCreateOrUpdateByEmailHandler::handle(
            $mockBuilder,
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
            ['create', [$requestBody], $resourceResponse]
        ];

        $mockBuilder->method('request')->willReturn($builder->request());
        $mockBuilder->method('__call')->willReturnMap($map);

        $this->expectException(HubspotApiException::class);

        /**
         * @var BuilderInterface $mockBuilder
         */
        ContactCreateOrUpdateByEmailHandler::handle(
            $mockBuilder,
            $requestBody
        );
    }

    public function testIfChangeExceptionOnRequestErrorToFalse()
    {
        $result = [
            'id' => 1
        ];

        $baseResource = new ContactHubspot;
 
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

        $mockRequest = $this->getMockBuilder(Request::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['removeException', 'hasWithRequestException'])
            ->getMock();

        $map = [
            ['withRequestException', [false], $mockBuilder],
            ['create', [$requestBody], $resourceResponse]
        ];

        $mockBuilder->method('request')->willReturn($mockRequest);
        $mockBuilder->method('__call')->willReturnMap($map);

        $mockRequest->expects($this->once(1))->method('removeException');

        /**
         * @var BuilderInterface $mockBuilder
         */
        ContactCreateOrUpdateByEmailHandler::handle(
            $mockBuilder,
            $requestBody
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
        $resourceResponse = ResourceFactory::build($actionSchema, $curl, $this->requestInfoObject);

        $request = RequestFactory::build($baseResource);

        $builder = $this->getMockBuilder(Builder::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['request', '__call'])
            ->getMock();

        $builder->method('request')->willReturn($request);
        $builder->expects($this->once())->method('__call')->willReturn($resourceResponse);

        /**
         * @var BuilderInterface $builder
         */
        ContactCreateOrUpdateByEmailHandler::handle(
            $builder,
            ['properties'=>['name' => 'Lorem']],
            1
        );
    }

    /*
    public function testIfMatchNewIdInMessage()
    {
        $responseMock = $this->getMockBuilder(Response::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['__get', 'getStatus', 'hasErrors', 'isInvalidEmailError'])
            ->getMock();

        $getMap = [
            ['message', 'id 555 n']
        ];

        $responseMock->method('__get')->willReturnMap($getMap);
        $responseMock->method('isInvalidEmailError')->willReturn(false);
        $responseMock->method('getStatus')->willReturn(409);
        $responseMock->method('hasErrors')->willReturn(true);


        $resource = ResourceFactory::build(new ContactHubspot, $responseMock);

        $request = RequestFactory::build(new ContactHubspot);

        $builderMock = $this->getMockBuilder(Builder::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['request', '__call'])
            ->getMock();

        $map = [
            'create' => $resource,
            'update' => $resource,
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

        $requestBody = ['properties'=>['name' => 'Lorem']];


        ContactCreateOrUpdateByEmailHandler::handle(
            $builderMock,
            $requestBody
        );

        $this->assertEquals(1, $update);

    }
    */
}
