<?php

namespace LTL\Hubspot\Tests\Resource;

use LTL\Hubspot\Concerns\WithEnrollUpdateList;
use LTL\Hubspot\Concerns\WithHeaders;
use LTL\Hubspot\Concerns\WithRequestException;
use LTL\Hubspot\Concerns\WithRequestTries;
use LTL\Hubspot\Containers\BuilderContainer;
use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Factories\BuilderFactory;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use LTL\Hubspot\Tests\Resource\Concerns\ContactHubspot as ConcernsContactHubspot;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class ConcernsTest extends TestCase
{
    public function testWithRequestException()
    {
        $resource = new class extends ContactHubspot implements WithRequestException {

        };

        $builder = BuilderContainer::get($resource);

        $request = $builder->request();

        $this->assertTrue($request->hasWithRequestException());
    }

    public function testWithRequestTries()
    {
        $resource = new class extends ContactHubspot implements WithRequestTries {

        };

        $builder = BuilderContainer::get($resource);

        $request = $builder->request();

        $this->assertEquals(HubspotConfig::MAX_REQUESTS_TRIES, $request->getRequestsTries());
    }

    public function testWithResponseEnrollUpdatedListWithMaxLimitWithListFilters()
    {
        $expected = [
            'maxLimit' => 1,
            'withListFilters' => 1,
            'enrollObjectsUpdateList' => 1
        ];

        $resourceMock = $this->getMockBuilder(ConcernsContactHubspot::class)
            ->disableOriginalConstructor()->getMock();

        $constructCalls = [
            'maxLimit' => 0,
            'withListFilters' => 0,
            'enrollObjectsUpdateList' => 0
        ];

        $resourceMock->method('__call')->willReturnCallback(function (...$params) use (&$constructCalls) {
            $method = current($params);

            $constructCalls[$method]++;
        });

        $reflection = new ReflectionClass($resourceMock);
        $constructor = $reflection->getConstructor();
        $constructor->invoke($resourceMock);

        $this->assertEquals($expected, $constructCalls);
    }

    public function testWithHeaders()
    {
        $expected = [
            CURLOPT_HEADER => true
        ];

        $resource = new class extends ContactHubspot implements WithHeaders {

        };

        $builder = BuilderContainer::get($resource);

        $request = $builder->request();

        $this->assertEquals($expected, $request->getCurlParams());
    }

    public function testPropertiesAndAssociationsInit()
    {
        $expected = [
            'properties' => 'name,email',
            'propertiesWithHistory' => 'phone',
            'associations' => 'deals,companies'
        ];

        $resource = new class extends ContactHubspot {
            protected function init()
            {
                $this->oAuth('555');
            }

            protected array $properties = [
                'name',
                'email'
            ];

            protected array $propertiesWithHistory = [
                'phone'
            ];

            protected array $associations = [
                'deals',
                'companies'
            ];
        };

        $builder = BuilderContainer::get($resource);

        $request = $builder->request();

        $this->assertEquals($expected, $request->getQueries());
    }
}
