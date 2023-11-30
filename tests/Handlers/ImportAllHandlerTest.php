<?php

namespace LTL\Hubspot\Tests\Request;

use LTL\Curl\Curl;
use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Builder;
use LTL\Hubspot\Core\BuilderInterface;
use LTL\Hubspot\Core\Handlers\Handlers;
use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Factories\ResourceFactory;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use PHPUnit\Framework\TestCase;

class ImportAllHandlerTest extends TestCase
{

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

        /**
         * @var CurlInterface $curl1
         */
        $response = new Response($curl1, $actionSchema);
        $resource1 = ResourceFactory::build($baseResource, $response);
        $mockResource1 = $this->getMockBuilder(ContactHubspot::class)
            ->onlyMethods(['__call'])
            ->getMock();
            
        $mockResource1->method('__call')->willReturn($resource1);

        $curl2 = $this->getMockBuilder(Curl::class)->getMock();
        $curl2->method('response')->willReturn(json_encode($result2));
        $actionSchema = SchemaContainer::getAction($baseResource, 'getAll');

        /**
         * @var CurlInterface $curl2
         */
        $response = new Response($curl2, $actionSchema);
        $resource2 = ResourceFactory::build($baseResource, $response);
        $mockResource2 = $this->getMockBuilder(ContactHubspot::class)
            ->onlyMethods(['__call'])
            ->getMock();
        $mockResource2->method('__call')->willReturn($resource2);
        
        $builder = $this->getMockBuilder(Builder::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['__destruct', '__call'])
            ->getMock();

        $builder->method('__call')->willReturnOnConsecutiveCalls(
            $resource1,
            $builder,
            $resource2
        );
    
        $results = [];

        /**
         * @var BuilderInterface $builder
         */
        Handlers::call(
            $builder,
            'import_all',
            [
                function ($item) use (&$results) {
                    $results = array_merge($results, $item['results']);
                }
            ]
        );

        $this->assertEquals([1,2,3], $results);
    }
}
