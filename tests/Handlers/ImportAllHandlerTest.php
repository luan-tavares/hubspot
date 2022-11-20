<?php

namespace LTL\Hubspot\Tests\Request;

use LTL\Curl\Curl;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Handlers\Handlers;
use LTL\Hubspot\Core\Handlers\ImportAll\ImportAllHandler;
use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Factories\ResourceFactory;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use PHPUnit\Framework\TestCase;

class ImportAllHandlerTest extends TestCase
{
    private ContactHubspot $resource;

    protected function setUp(): void
    {
    }

    public function testIfImportAllHandlerNameIsCorrect()
    {
        $baseResource = new ContactHubspot;
        $actionSchema = SchemaContainer::getAction($baseResource, 'importAll');

        $this->assertEquals('import_all', $actionSchema->handler);
    }

    public function testIfNotIsHandlerNameIsNull()
    {
        $baseResource = new ContactHubspot;
        $actionSchema = SchemaContainer::getAction($baseResource, 'getAll');

        $this->assertNull($actionSchema->handler);
    }

    public function testIfImporAllReturnTwoTimes()
    {
        $result1 = [
            'results' => [1,2],
            'paging' => [
                'next' => [
                    'after' => 2
                ]
            ]
        ];
        
        $result2 = [
            'results' => [3],
        ];

        $baseResource = new ContactHubspot;

        

        $curl1 = $this->getMockBuilder(Curl::class)->getMock();
        $curl1->method('response')->willReturn(json_encode($result1));
        $actionSchema = SchemaContainer::getAction($baseResource, 'getAll');
        $response = new Response($curl1, $actionSchema);
        $resource1 = ResourceFactory::build($baseResource, $response);
        $mockResource1 = $this->getMockBuilder(ContactHubspot::class)
            ->addMethods(['getAll'])
            ->getMock();
        $mockResource1->method('getAll')->willReturn($resource1);

        $curl2 = $this->getMockBuilder(Curl::class)->getMock();
        $curl2->method('response')->willReturn(json_encode($result2));
        $actionSchema = SchemaContainer::getAction($baseResource, 'getAll');
        $response = new Response($curl2, $actionSchema);
        $resource2 = ResourceFactory::build($baseResource, $response);
        $mockResource2 = $this->getMockBuilder(ContactHubspot::class)
            ->addMethods(['getAll'])
            ->getMock();
        $mockResource2->method('getAll')->willReturn($resource2);

        $limitMap = [
            [0, $mockResource1],
            [2, $mockResource2]
        ];

        $resource = $this->getMockBuilder(ContactHubspot::class)
            ->addMethods(['limit', 'after'])
            ->getMock();

        $resource->method('limit')->will($this->returnSelf());
        $resource->method('after')->will($this->returnValueMap($limitMap));

        $results = [];

        Handlers::call(
            $resource,
            'import_all',
            [
                function ($item) use (&$results) {
                    $results = array_merge($results, $item['results']);
                },
                40
            ]
        );

        $this->assertEquals([1,2,3], $results);
    }
}