<?php

namespace LTL\Hubspot\Tests\Request;

use LTL\Curl\Curl;
use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Builder;
use LTL\Hubspot\Core\BuilderInterface;
use LTL\Hubspot\Core\Handlers\AssociationImportAll\AssociationImportAllHandler;
use LTL\Hubspot\Core\Response\RequestInfoObject;
use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Factories\ResourceFactory;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use LTL\Hubspot\Resources\V4\AssociationHubspot;
use PHPUnit\Framework\TestCase;

class AssociationImportAllHandlerTest extends TestCase
{
    private AssociationHubspot $baseResource;

    private RequestInfoObject $requestInfoObject;

    protected function setUp(): void
    {
        $this->baseResource = new AssociationHubspot;

        $this->requestInfoObject = new RequestInfoObject([
            'hasObject' => false
        ]);
    }

    public function testIfHandlerNameIsCorrect()
    {
        $actionSchema = SchemaContainer::getAction($this->baseResource, 'importAll');
   
        $this->assertEquals('associations_import_all', $actionSchema->handler);
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

        $curl1 = $this->getMockBuilder(Curl::class)->getMock();
        $curl1->method('response')->willReturn(json_encode($result1));
        $actionSchema = SchemaContainer::getAction($this->baseResource, 'getAll');

        /**
         * @var CurlInterface $curl1
         */
        $resource1 = ResourceFactory::build($actionSchema, $curl1, $this->requestInfoObject);
        $mockResource1 = $this->getMockBuilder($this->baseResource::class)
            ->onlyMethods(['__call'])
            ->getMock();
            
        $mockResource1->method('__call')->willReturn($resource1);

        $curl2 = $this->getMockBuilder(Curl::class)->getMock();
        $curl2->method('response')->willReturn(json_encode($result2));
        $actionSchema = SchemaContainer::getAction($this->baseResource, 'getAll');

        /**
         * @var CurlInterface $curl2
         */
        $resource2 = ResourceFactory::build($actionSchema, $curl2, $this->requestInfoObject);
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
        AssociationImportAllHandler::handle($builder, 'contact', 111, 'deal', function ($item) use (&$results) {
            $results = array_merge($results, $item['results']);
        });

        $this->assertEquals([1,2,3], $results);
    }
}
