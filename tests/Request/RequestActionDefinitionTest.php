<?php

namespace LTL\Hubspot\Tests\Request;

use LTL\Hubspot\Containers\BuilderContainer;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\HubspotApikey;
use LTL\Hubspot\Core\Request\RequestActionDefinition;
use LTL\Hubspot\Core\Request\RequestCurlCaller;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Resources\ContactHubspot;
use LTL\Hubspot\Resources\FileHubspot;
use LTL\Hubspot\Resources\HubDbHubspot;
use PHPUnit\Framework\TestCase;

class RequestActionDefinitionTest extends TestCase
{
    protected $resource;

    protected $request;

    private $getContactArguments;

    private $items;

    protected function setUp(): void
    {
        $this->resource = $this->createMock(ContactHubspot::class);

        $this->resource->method('__toString')->willReturn('contacts-v3');

        HubspotApikey::store('123456');

        $this->request = BuilderContainer::get($this->resource)->request();
        
        $this->getContactArguments = [
            'idOrEmail',
        ];

        $this->createContactArguments = [
            [
                'id' => 123456789,
                'results' => []
            ]
        ];

        $this->updateContactArguments = [
            123456789,
            [
                'id' => 123456789,
                'results' => []
            ]
        ];
    }

    public function testRequestUriIsCorrectWithRelativePath()
    {
        $actionSchema = SchemaContainer::getAction($this->resource, 'get');
        
        RequestActionDefinition::finish($this->request, $actionSchema, $this->getContactArguments);
        
        $this->assertEquals(
            $this->request->getUri(),
            'https://api.hubapi.com/crm/v3/objects/contacts/idOrEmail?hapikey=123456'
        );
    }

    public function testRequestUriIsCorrectWithAbsolutePath()
    {
        $fileV2Resource = $this->createMock(\LTL\Hubspot\Resources\V2\FileHubspot::class);

        $fileV2Resource->method('__toString')->willReturn('files-v2');

        $actionSchema = SchemaContainer::getAction($fileV2Resource, 'upload');

        $request = BuilderContainer::get($fileV2Resource)->request();
        
        RequestActionDefinition::finish($request, $actionSchema, [['files' => []]]);
        
        $this->assertEquals(
            $request->getUri(),
            'https://api.hubapi.com/filemanager/api/v3/files/upload?hapikey=123456'
        );
    }

    public function testBaseQueriesAddPropertiesIsCorrect()
    {
        $actionSchema = SchemaContainer::getAction($this->resource, 'getByEmail');
        
        RequestActionDefinition::finish($this->request, $actionSchema, $this->getContactArguments);
        
        $this->assertEquals($this->request->getQueries(), ['hapikey' => '123456', 'idProperty' => 'email']);
    }


    public function testRequestBodyGetMethodIsCorrect()
    {
        $actionSchema = SchemaContainer::getAction($this->resource, 'get');
        
        RequestActionDefinition::finish($this->request, $actionSchema, $this->getContactArguments);
        
        $this->assertEquals($this->request->getBody(), []);
    }

    public function testRequestHeaderGetMethodIsCorrect()
    {
        $actionSchema = SchemaContainer::getAction($this->resource, 'get');
        
        RequestActionDefinition::finish($this->request, $actionSchema, $this->getContactArguments);
        
        $this->assertEquals($this->request->getHeaders(), []);
    }


    public function testRequestHeaderPostMethodIsCorrect()
    {
        $actionSchema = SchemaContainer::getAction($this->resource, 'create');
        
        RequestActionDefinition::finish($this->request, $actionSchema, $this->createContactArguments);
        
        $this->assertEquals($this->request->getHeaders(), [
            'Content-Type' => 'application/json'
        ]);
    }

    public function testRequestHeaderUploadFileIsCorrect()
    {
        $builder = BuilderContainer::get(new FileHubspot);
 
        $request = $builder->request();

        $actionSchema = SchemaContainer::getAction($builder->baseResource(), 'upload');
        
        RequestActionDefinition::finish($request, $actionSchema, $this->createContactArguments);
        
        $this->assertEquals($request->getHeaders(), [
            'Content-Type' => 'multipart/form-data'
        ]);
    }

    public function testRequestHeaderHubDbExportToCsv()
    {
        $builder = BuilderContainer::get(new HubDbHubspot);
 
        $request = $builder->request();

        $actionSchema = SchemaContainer::getAction($builder->baseResource(), 'exportToCsv');
        
        RequestActionDefinition::finish($request, $actionSchema, ['tableId']);
        
        $this->assertEquals($request->getHeaders(), [
            'accept' => 'application/vnd.ms-excel'
        ]);
    }

    public function testRequestBodyPostMethodIsCorrect()
    {
        $actionSchema = SchemaContainer::getAction($this->resource, 'create');
        
        RequestActionDefinition::finish($this->request, $actionSchema, $this->createContactArguments);
        
        $this->assertEquals($this->request->getBody(), [
            'id' => 123456789,
            'results' => []
        ]);
    }


    public function testExceptionIfParamsIsNotCorrect()
    {
        $actionSchema = SchemaContainer::getAction($this->resource, 'create');

        $this->expectException(HubspotApiException::class);
        
        RequestActionDefinition::finish($this->request, $actionSchema, $this->updateContactArguments);
    }

    public function testExceptionIfBodyIsNotArray()
    {
        $actionSchema = SchemaContainer::getAction($this->resource, 'create');

        $this->expectException(HubspotApiException::class);
        
        RequestActionDefinition::finish($this->request, $actionSchema, $this->getContactArguments);
    }

    public function testFinishReturnIsRequestCurlCaller()
    {
        $actionSchema = SchemaContainer::getAction($this->resource, 'get');

        $this->assertInstanceOf(
            RequestCurlCaller::class,
            RequestActionDefinition::finish($this->request, $actionSchema, $this->getContactArguments)
        );
    }

    public function testChangeDispatchToTrueIsTrue()
    {
        $actionSchema = SchemaContainer::getAction($this->resource, 'create');
        
        RequestActionDefinition::finish($this->request, $actionSchema, $this->createContactArguments);
        
        $this->assertTrue($this->request->hasDispatched());
    }
}
