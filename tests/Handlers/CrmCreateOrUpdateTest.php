<?php

namespace LTL\Hubspot\Tests\Handlers;

use LTL\Curl\Curl;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Builder;
use LTL\Hubspot\Core\Handlers\CrmCreateOrUpdate\CrmCreateOrUpdateHandler;
use LTL\Hubspot\Core\Handlers\Handlers;
use LTL\Hubspot\Core\Handlers\ImportAll\ImportAllHandler;
use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Factories\BuilderFactory;
use LTL\Hubspot\Factories\RequestFactory;
use LTL\Hubspot\Factories\ResourceFactory;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use PHPUnit\Framework\TestCase;

class CrmCreateOrUpdateTest extends TestCase
{
    private ContactHubspot $resource;

    protected function setUp(): void
    {
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
            'id' => 222
        ];

        $baseResource = new ContactHubspot;

        $curl = $this->getMockBuilder(Curl::class)->getMock();
        $curl->method('response')->willReturn(json_encode($result));
        $curl->method('status')->willReturn(404);

        $actionSchema = SchemaContainer::getAction($baseResource, 'create');
        $response = new Response($curl, $actionSchema);
        $resourceCreate = ResourceFactory::build($baseResource, $response);

        $request = RequestFactory::build($baseResource);

        $builder = $this->getMockBuilder(Builder::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['request', '__call'])
            ->getMock();

        $builder->method('request')->willReturn($request);
        $builder->method('__call')->willReturn($resourceCreate);

           
        $builder->expects($this->exactly(5))->method('__call')->willReturn($resourceCreate);

        $result = Handlers::call(
            $builder,
            'create_or_update',
            [
                ['properties'=>['name' => 'Lorem']], null
            ]
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
        $response = new Response($curl, $actionSchema);
        $resourceUpdate = ResourceFactory::build($baseResource, $response);

        $request = RequestFactory::build($baseResource);

        $builder = $this->getMockBuilder(Builder::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['request', '__call'])
            ->getMock();

        $builder->method('request')->willReturn($request);
        $builder->method('__call')->willReturn($resourceUpdate);
        
        $builder->expects($this->exactly(2))->method('__call')->willReturn($resourceUpdate);

        CrmCreateOrUpdateHandler::handle(
            $builder,
            ['properties'=>['name' => 'Lorem']],
            1
        );
    }
}
