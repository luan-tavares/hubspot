<?php

namespace LTL\Hubspot\Tests\Request;

use LTL\Hubspot\Containers\ApikeyContainer;
use LTL\Hubspot\Containers\RequestContainer;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Request\RequestActionDefinition;
use LTL\Hubspot\Core\Request\RequestCurlCaller;
use LTL\Hubspot\Core\Resource\Resource;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Resources\ContactHubspot;
use LTL\Hubspot\Resources\FileHubspot;
use LTL\Hubspot\Resources\HubDbHubspot;
use PHPUnit\Framework\TestCase;

class RequestActionDefinitionTest extends TestCase
{
    protected $contactResource;

    protected $contactRequest;

    private $getContactArguments;

    private $items;

    protected function setUp(): void
    {
        $this->contactResource = $this->createMock(ContactHubspot::class);

        $this->contactResource->method('__toString')->willReturn('contacts-v3');

        ApikeyContainer::store('123456');

        $this->contactRequest = RequestContainer::get($this->contactResource);
        
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

    public function testRequestUriIsCorrect()
    {
        $actionSchema = SchemaContainer::getAction($this->contactResource, 'get');
        
        RequestActionDefinition::finish($this->contactRequest, $actionSchema, $this->getContactArguments);
        
        $this->assertEquals(
            $this->contactRequest->getUri(),
            'https://api.hubapi.com/crm/v3/objects/contacts/idOrEmail?hapikey=123456'
        );
    }

    public function testBaseQueriesAddPropertiesIsCorrect()
    {
        $actionSchema = SchemaContainer::getAction($this->contactResource, 'getByEmail');
        
        RequestActionDefinition::finish($this->contactRequest, $actionSchema, $this->getContactArguments);
        
        $this->assertEquals($this->contactRequest->getQueries(), ['hapikey' => '123456', 'idProperty' => 'email']);
    }


    public function testRequestBodyGetMethodIsCorrect()
    {
        $actionSchema = SchemaContainer::getAction($this->contactResource, 'get');
        
        RequestActionDefinition::finish($this->contactRequest, $actionSchema, $this->getContactArguments);
        
        $this->assertEquals($this->contactRequest->getBody(), []);
    }

    public function testRequestHeaderGetMethodIsCorrect()
    {
        $actionSchema = SchemaContainer::getAction($this->contactResource, 'get');
        
        RequestActionDefinition::finish($this->contactRequest, $actionSchema, $this->getContactArguments);
        
        $this->assertEquals($this->contactRequest->getHeaders(), []);
    }


    public function testRequestHeaderPostMethodIsCorrect()
    {
        $actionSchema = SchemaContainer::getAction($this->contactResource, 'create');
        
        RequestActionDefinition::finish($this->contactRequest, $actionSchema, $this->createContactArguments);
        
        $this->assertEquals($this->contactRequest->getHeaders(), [
            'Content-Type' => 'application/json'
        ]);
    }

    public function testRequestHeaderUploadFileIsCorrect()
    {
        $fileResource = $this->createMock(FileHubspot::class);
        $fileResource->method('__toString')->willReturn('files-v3');
 
        $fileRequest = RequestContainer::get($fileResource);

        $actionSchema = SchemaContainer::getAction($fileResource, 'upload');
        
        RequestActionDefinition::finish($fileRequest, $actionSchema, $this->createContactArguments);
        
        $this->assertEquals($fileRequest->getHeaders(), [
            'Content-Type' => 'multipart/form-data'
        ]);
    }

    public function testRequestHeaderHubDbExportToCsv()
    {
        $fileResource = $this->createMock(HubDbHubspot::class);
        $fileResource->method('__toString')->willReturn('hub-db-v3');
 
        $fileRequest = RequestContainer::get($fileResource);

        $actionSchema = SchemaContainer::getAction($fileResource, 'exportToCsv');
        
        RequestActionDefinition::finish($fileRequest, $actionSchema, ['tableId']);
        
        $this->assertEquals($fileRequest->getHeaders(), [
            'accept' => 'application/vnd.ms-excel'
        ]);
    }

    public function testRequestBodyPostMethodIsCorrect()
    {
        $actionSchema = SchemaContainer::getAction($this->contactResource, 'create');
        
        RequestActionDefinition::finish($this->contactRequest, $actionSchema, $this->createContactArguments);
        
        $this->assertEquals($this->contactRequest->getBody(), [
            'id' => 123456789,
            'results' => []
        ]);
    }


    public function testExceptionIfParamsIsNotCorrect()
    {
        $actionSchema = SchemaContainer::getAction($this->contactResource, 'create');

        $this->expectException(HubspotApiException::class);
        
        RequestActionDefinition::finish($this->contactRequest, $actionSchema, $this->updateContactArguments);
    }

    public function testExceptionIfBodyIsNotArray()
    {
        $actionSchema = SchemaContainer::getAction($this->contactResource, 'create');

        $this->expectException(HubspotApiException::class);
        
        RequestActionDefinition::finish($this->contactRequest, $actionSchema, $this->getContactArguments);
    }

    public function testFinishReturnIsRequestCurlCaller()
    {
        $actionSchema = SchemaContainer::getAction($this->contactResource, 'get');

        $this->assertInstanceOf(
            RequestCurlCaller::class,
            RequestActionDefinition::finish($this->contactRequest, $actionSchema, $this->getContactArguments)
        );
    }

    public function testChangeDispatchToTrueIsTrue()
    {
        $actionSchema = SchemaContainer::getAction($this->contactResource, 'create');
        
        RequestActionDefinition::finish($this->contactRequest, $actionSchema, $this->createContactArguments);
        
        $this->assertTrue($this->contactRequest->hasDispatched());
    }
}
