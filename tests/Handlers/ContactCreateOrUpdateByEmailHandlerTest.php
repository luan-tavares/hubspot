<?php

namespace LTL\Hubspot\Tests\Request;

use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Builder;
use LTL\Hubspot\Core\BuilderInterface;
use LTL\Hubspot\Core\Handlers\ContactCreateOrUpdateByEmail\ContactCreateOrUpdateByEmailHandler;
use LTL\Hubspot\Core\Handlers\Handlers;
use LTL\Hubspot\Core\Request\Request;
use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Factories\RequestFactory;
use LTL\Hubspot\Factories\ResourceFactory;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use PHPUnit\Framework\TestCase;

class ContactCreateOrUpdateByEmailHandlerTest extends TestCase
{
    private ContactHubspot $resource;

    protected function setUp(): void
    {
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

        /**
         * @var CurlInterface $curl
         */
        $response = new Response($curl, SchemaContainer::getAction($baseResource, 'create'));
        $resourceResponse = ResourceFactory::build($baseResource, $response);

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
        $builder = $baseResource->exceptionIfRequestError();
 
        $curl = $this->getMockBuilder(CurlInterface::class)->getMock();
        $curl->method('response')->willReturn(json_encode($result));
        $curl->method('status')->willReturn(404);

        /**
         * @var CurlInterface $curl
         */
        $response = new Response($curl, SchemaContainer::getAction($baseResource, 'create'));
        $resourceResponse = ResourceFactory::build($baseResource, $response);
 
        $requestBody = ['properties'=>['email' => 'lorem@ipsum.com']];

        $mockBuilder = $this->getMockBuilder(Builder::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['request', '__call'])
            ->getMock();

        $map = [
            ['exceptionIfRequestError', [false], $mockBuilder],
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

        /**
         * @var CurlInterface $curl
         */
        $response = new Response($curl, SchemaContainer::getAction($baseResource, 'create'));
        $resourceResponse = ResourceFactory::build($baseResource, $response);
 
        $requestBody = ['properties'=>['email' => 'lorem@ipsum.com']];

        $mockBuilder = $this->getMockBuilder(Builder::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['request', '__call'])
            ->getMock();

        $mockRequest = $this->getMockBuilder(Request::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['removeException', 'hasExceptionIfRequestError'])
            ->getMock();

        $map = [
            ['exceptionIfRequestError', [false], $mockBuilder],
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
}
