<?php

namespace LTL\Hubspot\Tests\Request;

use DateTimeImmutable;
use LTL\Curl\Curl;
use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Containers\BuilderContainer;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Globals\ApikeyGlobal;
use LTL\Hubspot\Core\Globals\TimesleepGlobal;
use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Request\RequestDefinition;
use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Factories\RequestFactory;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use LTL\Hubspot\Resources\V3\FileHubspot;
use LTL\Hubspot\Resources\V3\HubDbHubspot;
use PHPUnit\Framework\TestCase;

class RequestDefinitionTest extends TestCase
{
    protected $resource;

    protected $request;

    private $getContactArguments;

    private $createContactArguments;

    private $updateContactArguments;

    private $items;

    protected function setUp(): void
    {
        $this->resource = $this->createMock(ContactHubspot::class);

        $this->resource->method('__toString')->willReturn('contacts-v3');

        ApikeyGlobal::store('123456');

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
        
        $requestDefinition = new RequestDefinition($this->request, $actionSchema, $this->getContactArguments);
        
        $this->assertEquals(
            $this->request->getUri(),
            'https://api.hubapi.com/crm/v3/objects/contacts/idOrEmail?hapikey=123456'
        );
    }

    public function testRequestUriIsCorrectWithAbsolutePath()
    {
        $fileV2Resource = new \LTL\Hubspot\Resources\V2\FileHubspot;

        $actionSchema = SchemaContainer::getAction($fileV2Resource, 'upload');


        $request = BuilderContainer::get($fileV2Resource)->request();
        
        $requestDefinition = new RequestDefinition($request, $actionSchema, [['files' => []]]);

        
        $this->assertEquals(
            $request->getUri(),
            'https://api.hubapi.com/filemanager/api/v3/files/upload?hapikey=123456'
        );
    }

    public function testBaseQueriesAddPropertiesIsCorrect()
    {
        $actionSchema = SchemaContainer::getAction($this->resource, 'getByEmail');
        
        $requestDefinition = new RequestDefinition($this->request, $actionSchema, $this->getContactArguments);
        
        $this->assertEquals($this->request->getQueries(), ['hapikey' => '123456', 'idProperty' => 'email']);
    }


    public function testRequestBodyGetMethodIsCorrect()
    {
        $actionSchema = SchemaContainer::getAction($this->resource, 'get');
        
        $requestDefinition = new RequestDefinition($this->request, $actionSchema, $this->getContactArguments);
        
        $this->assertEquals($this->request->getBody(), []);
    }

    public function testRequestHeaderGetMethodIsCorrect()
    {
        $actionSchema = SchemaContainer::getAction($this->resource, 'get');
        
        $requestDefinition = new RequestDefinition($this->request, $actionSchema, $this->getContactArguments);
        
        $this->assertEquals($this->request->getHeaders(), []);
    }


    public function testRequestHeaderPostMethodIsCorrect()
    {
        $actionSchema = SchemaContainer::getAction($this->resource, 'create');
        
        $requestDefinition = new RequestDefinition($this->request, $actionSchema, $this->createContactArguments);
        
        $this->assertEquals($this->request->getHeaders(), [
            'Content-Type' => 'application/json'
        ]);
    }

    public function testRequestHeaderUploadFileIsCorrect()
    {
        $builder = BuilderContainer::get(new FileHubspot);
 
        $request = $builder->request();

        $actionSchema = SchemaContainer::getAction($builder->baseResource(), 'upload');
        
        $requestDefinition = new RequestDefinition($request, $actionSchema, $this->createContactArguments);
        
        $this->assertEquals($request->getHeaders(), [
            'Content-Type' => 'multipart/form-data'
        ]);
    }

    public function testRequestHeaderHubDbExportToCsv()
    {
        $builder = BuilderContainer::get(new HubDbHubspot);
 
        $request = $builder->request();

        $actionSchema = SchemaContainer::getAction($builder->baseResource(), 'exportToCsv');
        
        $requestDefinition = new RequestDefinition($request, $actionSchema, ['tableId']);
        
        $this->assertEquals($request->getHeaders(), [
            'accept' => 'application/vnd.ms-excel'
        ]);
    }

    public function testIfDefinitionAddRequestMethod()
    {
        $builder = BuilderContainer::get(new HubDbHubspot);
 
        $request = $builder->request();

        $actionSchema = SchemaContainer::getAction($builder->baseResource(), 'exportToCsv');
        
        $requestDefinition = new RequestDefinition($request, $actionSchema, ['tableId']);
        
        $this->assertEquals('GET', $request->getMethod());
    }

    public function testRequestBodyPostMethodIsCorrect()
    {
        $actionSchema = SchemaContainer::getAction($this->resource, 'create');
        
        $requestDefinition = new RequestDefinition($this->request, $actionSchema, $this->createContactArguments);
        
        $this->assertEquals($this->request->getBody(), [
            'id' => 123456789,
            'results' => []
        ]);
    }


    public function testExceptionIfParamsIsNotCorrect()
    {
        $actionSchema = SchemaContainer::getAction($this->resource, 'create');

        $nArguments = count($this->updateContactArguments);
        $nParams = count($actionSchema->params ?? []) + count($actionSchema->queryAsParam ?? []) + ((int) $actionSchema->hasBody);

        $this->expectExceptionMessage(
            '"'. $actionSchema->resourceClass ."::{$actionSchema}(...)\" must be {$nParams} params, {$nArguments} given"
        );
        
        new RequestDefinition($this->request, $actionSchema, $this->updateContactArguments);
    }

    public function testExceptionIfBodyIsNotArray()
    {
        $requestBodyParam = 'noArray';

        $params = [
            123,
            $requestBodyParam
        ];

        $requestBodyType = gettype($requestBodyParam);

        $actionSchema = SchemaContainer::getAction($this->resource, 'update');

        $this->expectExceptionMessage(
            '"'. $actionSchema->resourceClass ."::{$actionSchema}()\" request body (last param) must be array or Body Object, {$requestBodyType} given"
        );
        
        new RequestDefinition($this->request, $actionSchema, $params);
    }

    public function testIfRecursiveCurlWithoutTooManyRequestsIsCorrect()
    {
        $requests = 1;

        $resource = new ContactHubspot;

        $request = RequestFactory::build($resource);

        $actionSchema = SchemaContainer::getAction($resource, 'getAll');

        $requestDefinition = new RequestDefinition($request, $actionSchema, []);


        $curl = $this->getMockBuilder(CurlInterface::class)->getMock();
        $curl->method('request')->willReturn($curl);
        $curl->method('addUri')->willReturn($curl);
        $curl->method('addHeaders')->willReturn($curl);
        $curl->method('addParams')->willReturn($curl);
        $curl->method('status')->willReturn(HubspotConfig::TOO_MANY_REQUESTS_ERROR_CODE);

        $response = new Response($curl, $actionSchema);


        $curl->expects($this->exactly($requests))->method('request');

        $requestDefinition->connect($curl);
    }

    public function testIfRecursiveCurlIsCorrect()
    {
        $tooManyRequests = 15;

        TimesleepGlobal::get(0);

        $resourceBuilder = ContactHubspot::tooManyRequestsTries($tooManyRequests);

        $request = $resourceBuilder->request();

        $actionSchema = SchemaContainer::getAction($resourceBuilder->baseResource(), 'getAll');

        $requestDefinition = new RequestDefinition($request, $actionSchema, []);


        $curl = $this->getMockBuilder(Curl::class)->getMock();
        $curl->method('request')->willReturn($curl);
        $curl->method('addUri')->willReturn($curl);
        $curl->method('addHeaders')->willReturn($curl);
        $curl->method('addParams')->willReturn($curl);
        $curl->method('status')->willReturn(HubspotConfig::TOO_MANY_REQUESTS_ERROR_CODE);


        $curl->expects($this->exactly($tooManyRequests))->method('request');

        $requestDefinition->connect($curl);
    }

    public function testIfSleepRecursiveCurlIsCorrect()
    {
        $tooManyRequests = 2;

        TimesleepGlobal::get(1);

        $resourceBuilder = ContactHubspot::tooManyRequestsTries($tooManyRequests);

        $request = $resourceBuilder->request();

        $actionSchema = SchemaContainer::getAction($resourceBuilder->baseResource(), 'getAll');

        $requestDefinition = new RequestDefinition($request, $actionSchema, []);


        $curl = $this->getMockBuilder(Curl::class)->getMock();
        $curl->method('request')->willReturn($curl);
        $curl->method('addUri')->willReturn($curl);
        $curl->method('addHeaders')->willReturn($curl);
        $curl->method('addParams')->willReturn($curl);
        $curl->method('status')->willReturn(HubspotConfig::TOO_MANY_REQUESTS_ERROR_CODE);

        $initTime = new DateTimeImmutable;

        $requestDefinition->connect($curl);

        $endTime = new DateTimeImmutable;

        $this->assertEquals(1, $endTime->diff($initTime)->s);
    }

    public function testIfDefaultRecursiveCurlIsCorrect()
    {
        $requests = 1;

        TimesleepGlobal::get(0);

        $resourceBuilder = ContactHubspot::tooManyRequestsTries($requests);

        $request = $resourceBuilder->request();

        $actionSchema = SchemaContainer::getAction($resourceBuilder->baseResource(), 'getAll');

        $requestDefinition = new RequestDefinition($request, $actionSchema, []);


        $curl = $this->getMockBuilder(Curl::class)->getMock();
        $curl->method('request')->willReturn($curl);
        $curl->method('addUri')->willReturn($curl);
        $curl->method('addHeaders')->willReturn($curl);
        $curl->method('addParams')->willReturn($curl);
        $curl->method('status')->willReturn(HubspotConfig::TOO_MANY_REQUESTS_ERROR_CODE);


        $curl->expects($this->exactly($requests))->method('request');

        $requestDefinition->connect($curl);
    }

    public function testIfTriesMore15ThrowException()
    {
        $tooManyRequests = 20;

        TimesleepGlobal::get(0);

        $this->expectException(HubspotApiException::class);

        ContactHubspot::tooManyRequestsTries($tooManyRequests);

     
    }

    public function testIfTriesLess1ThrowException()
    {
        $tooManyRequests = 0;

        TimesleepGlobal::get(0);

        $this->expectException(HubspotApiException::class);

        ContactHubspot::tooManyRequestsTries($tooManyRequests);
    }

    public function testIfExceptionIfRequestErrorMethodThrowException()
    {
        $resourceBuilder = ContactHubspot::exceptionIfRequestError();

        $request = $resourceBuilder->request();

        $actionSchema = SchemaContainer::getAction($resourceBuilder->baseResource(), 'getAll');

        $requestDefinition = new RequestDefinition($request, $actionSchema, []);


        $curl = $this->getMockBuilder(Curl::class)->getMock();
        $curl->method('request')->willReturn($curl);
        $curl->method('addUri')->willReturn($curl);
        $curl->method('addHeaders')->willReturn($curl);
        $curl->method('addParams')->willReturn($curl);
        $curl->method('error')->willReturn(true);

        $this->expectException(HubspotApiException::class);

        $requestDefinition->connect($curl);
    }

    public function testIfExceptionIfRequestErrorNoResponseThrowCorrectExceptionMessage()
    {
        $resourceBuilder = ContactHubspot::exceptionIfRequestError();

        $request = $resourceBuilder->request();

        $actionSchema = SchemaContainer::getAction($resourceBuilder->baseResource(), 'getAll');

        $requestDefinition = new RequestDefinition($request, $actionSchema, []);

        $status = 0;

        $curl = $this->getMockBuilder(Curl::class)->getMock();
        $curl->method('request')->willReturn($curl);
        $curl->method('addUri')->willReturn($curl);
        $curl->method('addHeaders')->willReturn($curl);
        $curl->method('addParams')->willReturn($curl);
        $curl->method('error')->willReturn(true);
        $curl->method('status')->willReturn($status);

        $this->expectExceptionMessage("Error {$status} :: \"NO RESPONSE\"");

        $requestDefinition->connect($curl);
    }

    public function testIfDefaultNotExceptionNotThrowException()
    {
        $resource = new ContactHubspot;

        $request = RequestFactory::build($resource);

        $actionSchema = SchemaContainer::getAction($resource, 'getAll');

        $requestDefinition = new RequestDefinition($request, $actionSchema, []);


        $curl = $this->getMockBuilder(Curl::class)->getMock();
        $curl->method('request')->willReturn($curl);
        $curl->method('addUri')->willReturn($curl);
        $curl->method('addHeaders')->willReturn($curl);
        $curl->method('addParams')->willReturn($curl);
        $curl->method('error')->willReturn(true);


        $curl->expects($this->once())->method('request');

        $requestDefinition->connect($curl);
    }
}
