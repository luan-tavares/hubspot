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
use LTL\Hubspot\Core\Request\RequestArguments;
use LTL\Hubspot\Core\Request\RequestConnection;
use LTL\Hubspot\Core\Request\RequestUri;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Factories\ActionSchemaFactory;
use LTL\Hubspot\Factories\RequestFactory;
use LTL\Hubspot\Resources\V3\CompanyHubspot;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use LTL\Hubspot\Resources\V3\CrmObjectHubspot;
use LTL\Hubspot\Resources\V3\FileHubspot;
use LTL\Hubspot\Resources\V3\HubDbHubspot;
use PHPUnit\Framework\TestCase;

class RequestConnectionTest extends TestCase
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

        $requestArguments = new RequestArguments($actionSchema, $this->getContactArguments);
        
        $this->assertEquals(
            RequestUri::get($this->request, $requestArguments),
            'https://api.hubapi.com/crm/v3/objects/contacts/idOrEmail?hapikey=123456'
        );
    }

    public function testRequestUriIsCorrectWithAbsolutePath()
    {
        $fileV2Resource = new \LTL\Hubspot\Resources\V2\FileHubspot;

        $actionSchema = SchemaContainer::getAction($fileV2Resource, 'upload');

        $request = BuilderContainer::get($fileV2Resource)->request();

        $requestArguments = new RequestArguments($actionSchema, [['files' => []]]);
        
        RequestConnection::handle($request, new RequestArguments($actionSchema, [['files' => []]]));
        
        $this->assertEquals(
            RequestUri::get($request, $requestArguments),
            'https://api.hubapi.com/filemanager/api/v3/files/upload?hapikey=123456'
        );
    }

    public function testBaseQueriesAddPropertiesIsCorrect()
    {
        $actionSchema = SchemaContainer::getAction($this->resource, 'getByEmail');

        RequestConnection::handle($this->request, new RequestArguments($actionSchema, $this->getContactArguments));
        
        $this->assertEquals($this->request->getQueries(), ['hapikey' => '123456', 'idProperty' => 'email']);
    }


    public function testRequestBodyGetMethodIsCorrect()
    {
        $actionSchema = SchemaContainer::getAction($this->resource, 'get');

        $requestArguments = new RequestArguments($actionSchema, $this->getContactArguments);
        
        $this->assertNull($requestArguments->body());
    }

    public function testRequestHeaderGetMethodIsCorrect()
    {
        $actionSchema = SchemaContainer::getAction($this->resource, 'get');
        
        RequestConnection::handle($this->request, new RequestArguments($actionSchema, $this->getContactArguments));
        
        $this->assertEquals($this->request->getHeaders(), []);
    }


    public function testRequestHeaderPostMethodIsCorrect()
    {
        $actionSchema = SchemaContainer::getAction($this->resource, 'create');
        
        RequestConnection::handle($this->request, new RequestArguments($actionSchema, $this->createContactArguments));
        
        $this->assertEquals($this->request->getHeaders(), [
            'Content-Type' => 'application/json'
        ]);
    }

    public function testRequestHeaderUploadFileIsCorrect()
    {
        $builder = BuilderContainer::get(new FileHubspot);
 
        $request = $builder->request();

        $actionSchema = SchemaContainer::getAction($builder->baseResource(), 'upload');
        
        RequestConnection::handle($request, new RequestArguments($actionSchema, $this->createContactArguments));
        
        $this->assertEquals($request->getHeaders(), [
            'Content-Type' => 'multipart/form-data'
        ]);
    }

    public function testRequestHeaderHubDbExportToCsv()
    {
        $builder = BuilderContainer::get(new HubDbHubspot);
 
        $request = $builder->request();

        $actionSchema = SchemaContainer::getAction($builder->baseResource(), 'exportToCsv');
        
        RequestConnection::handle($request, new RequestArguments($actionSchema, ['tableId']));
        
        $this->assertEquals($request->getHeaders(), [
            'accept' => 'application/vnd.ms-excel'
        ]);
    }

    public function testIfDefinitionAddRequestMethod()
    {
        $builder = BuilderContainer::get(new HubDbHubspot);
 
        $request = $builder->request();

        $actionSchema = SchemaContainer::getAction($builder->baseResource(), 'exportToCsv');
        
        $requestArguments = new RequestArguments($actionSchema, ['tableId']);
        
        $this->assertEquals('GET', $requestArguments->getMethod());
    }

    public function testRequestBodyPostMethodIsCorrect()
    {
        $actionSchema = SchemaContainer::getAction($this->resource, 'create');

        $requestArguments = new RequestArguments($actionSchema, $this->createContactArguments);
        
        $this->assertEquals($requestArguments->body(), [
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
        
        RequestConnection::handle($this->request, new RequestArguments($actionSchema, $this->updateContactArguments));
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

        $this->expectException(HubspotApiException::class);
        
        new RequestArguments($actionSchema, $params);
    }

    public function testIfBodyTypesIsCorrect()
    {
        $expects =[
            'array',
            "LTL\HubspotRequestBody\Resources\HubspotCrmCreateBody"
        ];

        $actionSchema = SchemaContainer::getAction(new CompanyHubspot, 'create');
        
        $this->assertEquals($expects, $actionSchema->bodyTypes);
    }

    public function testIfBodyTypesWithoutBodyIsNull()
    {
        $actionSchema = SchemaContainer::getAction(new CrmObjectHubspot, 'createAssociation');
        
        $this->assertNull($actionSchema->bodyTypes);
    }

    public function testIfRecursiveCurlWithoutTooManyRequestsIsCorrect()
    {
        $resource = new ContactHubspot;

        $request = RequestFactory::build($resource);

        $actionSchema = SchemaContainer::getAction($resource, 'getAll');

        $requestArguments = new RequestArguments($actionSchema);

        $curl = $this->getMockBuilder(CurlInterface::class)->getMock();
        $curl->method('status')->willReturn(HubspotConfig::TOO_MANY_REQUESTS_ERROR_CODE);

        $curl->expects($this->once())->method('request');

        /**
         * @var CurlInterface $curl
         */
        RequestConnection::handle($request, $requestArguments, $curl);
    }

    public function testIfRecursiveCurlIsCorrect()
    {
        $tries = 2;

        TimesleepGlobal::set(0);

        $resource = new ContactHubspot;

        $request = RequestFactory::build($resource);

        $request->setRequestTries($tries);

        $actionSchema = SchemaContainer::getAction($resource, 'getAll');

        $requestArguments = new RequestArguments($actionSchema);

        $curl = $this->getMockBuilder(Curl::class)->getMock();
        $curl->method('request')->willReturn($curl);
        $curl->method('addUri')->willReturn($curl);
        $curl->method('addHeaders')->willReturn($curl);
        $curl->method('addParams')->willReturn($curl);
        $curl->method('status')->willReturn(HubspotConfig::TOO_MANY_REQUESTS_ERROR_CODE);


        $curl->expects($this->exactly($tries))->method('request');

        /**
         * @var CurlInterface $curl
         */
        RequestConnection::handle($request, $requestArguments, $curl);
    }

    public function testIfSleepRecursiveCurlIsCorrect()
    {
        $tries = 2;

        TimesleepGlobal::set(1);

        $resource = new ContactHubspot;

        $request = RequestFactory::build($resource);

        $request->setRequestTries($tries);

        $actionSchema = SchemaContainer::getAction($resource, 'getAll');

        $requestArguments = new RequestArguments($actionSchema);

        $curl = $this->getMockBuilder(Curl::class)->getMock();
        $curl->method('request')->willReturn($curl);
        $curl->method('addUri')->willReturn($curl);
        $curl->method('addHeaders')->willReturn($curl);
        $curl->method('addParams')->willReturn($curl);
        $curl->method('status')->willReturn(HubspotConfig::TOO_MANY_REQUESTS_ERROR_CODE);

        $initTime = new DateTimeImmutable;

        /**
         * @var CurlInterface $curl
         */
        RequestConnection::handle($request, $requestArguments, $curl);

        $endTime = new DateTimeImmutable;

        $this->assertEquals(1, $endTime->diff($initTime)->s);
    }

    public function testIfTriesMAxAddOneThrowException()
    {
        $tries = HubspotConfig::MAX_REQUESTS_TRIES + 1;

        TimesleepGlobal::set(0);

        $resource = new ContactHubspot;

        $request = RequestFactory::build($resource);

        $this->expectException(HubspotApiException::class);

        $request->setRequestTries($tries);
    }

    public function testIfTriesMaxNotThrowException()
    {
        $tries = HubspotConfig::MAX_REQUESTS_TRIES;

        TimesleepGlobal::set(0);

        $resource = new ContactHubspot;

        $request = RequestFactory::build($resource);

        $this->expectNotToPerformAssertions();

        $request->setRequestTries($tries);
    }

    public function testIfTriesOneNotThrowException()
    {
        $tries = 1;

        TimesleepGlobal::set(0);

        $resource = new ContactHubspot;

        $request = RequestFactory::build($resource);

        $this->expectNotToPerformAssertions();

        $request->setRequestTries($tries);
    }

    public function testIfTriesOneIsDefault()
    {
        TimesleepGlobal::set(0);

        $resource = new ContactHubspot;

        $request = RequestFactory::build($resource);

        $this->assertEquals(1, $request->getRequestsTries());
    }

    public function testIfTriesLessZeroThrowException()
    {
        $tries = -1;

        TimesleepGlobal::set(0);

        $resource = new ContactHubspot;

        $request = RequestFactory::build($resource);

        $this->expectException(HubspotApiException::class);

        $request->setRequestTries($tries);
    }

    public function testIfWithRequestExceptionMethodThrowException()
    {
        $resourceBuilder = ContactHubspot::withRequestException();

        $request = $resourceBuilder->request();

        $actionSchema = SchemaContainer::getAction($resourceBuilder->baseResource(), 'getAll');

        $requestArguments = new RequestArguments($actionSchema);


        $curl = $this->getMockBuilder(Curl::class)->getMock();
        $curl->method('request')->willReturn($curl);
        $curl->method('addUri')->willReturn($curl);
        $curl->method('addHeaders')->willReturn($curl);
        $curl->method('addParams')->willReturn($curl);
        $curl->method('error')->willReturn(true);

        $this->expectException(HubspotApiException::class);

        /**
         * @var CurlInterface $curl
         */
        RequestConnection::handle($request, $requestArguments, $curl);
    }

    public function testIfWithRequestExceptionNoResponseThrowCorrectExceptionMessage()
    {
        $resourceBuilder = ContactHubspot::withRequestException();

        $request = $resourceBuilder->request();

        $actionSchema = SchemaContainer::getAction($resourceBuilder->baseResource(), 'getAll');

        $requestArguments = new RequestArguments($actionSchema);

        $status = 0;

        $curl = $this->getMockBuilder(Curl::class)->getMock();
        $curl->method('request')->willReturn($curl);
        $curl->method('addUri')->willReturn($curl);
        $curl->method('addHeaders')->willReturn($curl);
        $curl->method('addParams')->willReturn($curl);
        $curl->method('error')->willReturn(true);
        $curl->method('status')->willReturn($status);

        $this->expectExceptionMessage("Error {$status} :: \"NO RESPONSE\"");

        /**
         * @var CurlInterface $curl
         */
        RequestConnection::handle($request, $requestArguments, $curl);
    }

    public function testIfDefaultNotExceptionNotThrowException()
    {
        $resource = new ContactHubspot;

        $request = RequestFactory::build($resource);

        $actionSchema = SchemaContainer::getAction($resource, 'getAll');

        $requestArguments = new RequestArguments($actionSchema);

        $curl = $this->getMockBuilder(Curl::class)->getMock();
        $curl->method('request')->willReturn($curl);
        $curl->method('addUri')->willReturn($curl);
        $curl->method('addHeaders')->willReturn($curl);
        $curl->method('addParams')->willReturn($curl);
        $curl->method('error')->willReturn(true);

        $curl->expects($this->once())->method('request');

        /**
         * @var CurlInterface $curl
         */
        RequestConnection::handle($request, $requestArguments, $curl);
    }
}
