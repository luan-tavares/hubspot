<?php

namespace LTL\Hubspot\Tests\Resource;

use LTL\Curl\Curl;
use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Request\Interfaces\RequestInterface;
use LTL\Hubspot\Core\Request\Request;
use LTL\Hubspot\Core\Request\RequestArguments;
use LTL\Hubspot\Core\Request\RequestUri;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Response\RequestInfoObject;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Factories\ResourceFactory;
use LTL\Hubspot\Resources\V3\TicketHubspot;
use LTL\HubspotRequestBody\Resources\HubspotBatchUpdateBody;
use PHPUnit\Framework\TestCase;

class TicketBatchUpsertTest extends TestCase
{
    private array $requestBody = [
        'inputs' => [
            [
                'id' => 'EXT-1',
                'idProperty' => 'external_id',
                'properties' => ['subject' => 'Lorem']
            ],
            [
                'id' => 'EXT-2',
                'idProperty' => 'external_id',
                'properties' => ['subject' => 'Ipsum']
            ]
        ]
    ];

    public function testIfBatchUpsertIsInTicketActions()
    {
        $object = SchemaContainer::get(new TicketHubspot);

        $this->assertContains('batchUpsert', $object->getActions());
    }

    public function testIfBatchUpsertSchemaIsCorrect()
    {
        $object = SchemaContainer::getAction(new TicketHubspot, 'batchUpsert');

        $this->assertEquals('https://api.hubapi.com/crm/v3/objects/tickets/batch/upsert', $object->baseUri);
        $this->assertEquals('POST', $object->method);
        $this->assertTrue($object->hasBody);
        $this->assertEquals(['array'], $object->bodyTypes);
        $this->assertEquals('results', $object->iteratorIndex);
        $this->assertNull($object->afterIndex);
        $this->assertNull($object->handler);
        $this->assertNull($object->params);
        $this->assertEquals(TicketHubspot::class, $object->resourceClass);
    }

    public function testIfBatchUpsertUriIsCorrect()
    {
        $request = $this->getMockBuilder(Request::class)->disableOriginalConstructor()->getMock();
        $request->method('removeApiKey')->willReturn($request);
        $request->method('getQueries')->willReturn([]);

        $actionSchema = SchemaContainer::getAction(new TicketHubspot, 'batchUpsert');

        $requestArguments = new RequestArguments($actionSchema, [$this->requestBody]);

        /**
         * @var RequestInterface $request
         */
        $this->assertEquals(
            'https://api.hubapi.com/crm/v3/objects/tickets/batch/upsert',
            RequestUri::get($request, $requestArguments)
        );
    }

    public function testIfBatchUpsertArgumentsKeepArrayBody()
    {
        $actionSchema = SchemaContainer::getAction(new TicketHubspot, 'batchUpsert');

        $requestArguments = new RequestArguments($actionSchema, [$this->requestBody]);

        $this->assertEquals($this->requestBody, $requestArguments->body());
    }

    public function testIfBatchUpsertWithoutBodyThrowException()
    {
        $actionSchema = SchemaContainer::getAction(new TicketHubspot, 'batchUpsert');

        $this->expectException(HubspotApiException::class);
        $this->expectExceptionMessage('::batchUpsert(...)" must be 1 params, 0 given');

        new RequestArguments($actionSchema, []);
    }

    public function testIfBatchUpsertWithBodyBuilderThrowException()
    {
        $actionSchema = SchemaContainer::getAction(new TicketHubspot, 'batchUpsert');

        $this->expectException(HubspotApiException::class);
        $this->expectExceptionMessage('Method "batchUpsert" param "requestBody" must be array, object given');

        new RequestArguments($actionSchema, [new HubspotBatchUpdateBody]);
    }

    public function testIfBatchUpsertResponseIsIterable()
    {
        $result = [
            'status' => 'COMPLETE',
            'results' => [
                ['id' => '101', 'new' => true, 'properties' => ['subject' => 'Lorem']],
                ['id' => '102', 'new' => false, 'properties' => ['subject' => 'Ipsum']]
            ],
            'startedAt' => '2026-10-17T12:00:00.000Z',
            'completedAt' => '2026-10-17T12:00:01.000Z'
        ];

        $resource = $this->buildResource(200, $result);

        $ids = [];
        $news = [];

        foreach ($resource as $ticket) {
            $ids[] = $ticket->id;
            $news[] = $ticket->new;
        }

        $this->assertEquals(200, $resource->status());
        $this->assertFalse($resource->error());
        $this->assertFalse($resource->isMultiStatus());
        $this->assertNull($resource->getAfter());
        $this->assertCount(2, $resource);
        $this->assertEquals(['101', '102'], $ids);
        $this->assertEquals([true, false], $news);
        $this->assertEquals('COMPLETE', $resource['status']);
    }

    public function testIfBatchUpsertMultiStatusResponseIsCorrect()
    {
        $result = [
            'status' => 'COMPLETE',
            'results' => [
                ['id' => '101', 'new' => true, 'properties' => ['subject' => 'Lorem']]
            ],
            'numErrors' => 1,
            'errors' => [
                ['status' => 'error', 'category' => 'VALIDATION_ERROR', 'message' => 'Property values were not valid']
            ],
            'startedAt' => '2026-10-17T12:00:00.000Z',
            'completedAt' => '2026-10-17T12:00:01.000Z'
        ];

        $resource = $this->buildResource(207, $result);

        $this->assertEquals(207, $resource->status());
        $this->assertTrue($resource->isMultiStatus());
        $this->assertCount(1, $resource);
        $this->assertEquals(1, $resource['numErrors']);
    }

    private function buildResource(int $status, array $result): ResourceInterface
    {
        $curl = $this->getMockBuilder(Curl::class)->disableOriginalConstructor()->getMock();
        $curl->method('status')->willReturn($status);
        $curl->method('response')->willReturn(json_encode($result));
        $curl->method('uri')->willReturn('https://api.hubapi.com/crm/v3/objects/tickets/batch/upsert');
        $curl->method('headers')->willReturn(['Content-Type' => 'application/json;charset=utf-8']);

        $requestInfoObject = new RequestInfoObject([
            'hasObject' => false,
            'errorIfPropertyExists' => true
        ], new TicketHubspot);

        $actionSchema = SchemaContainer::getAction(new TicketHubspot, 'batchUpsert');

        /**
         * @var CurlInterface $curl
         */
        return ResourceFactory::build($actionSchema, $curl, $requestInfoObject);
    }
}
