<?php

namespace LTL\Hubspot\Tests\Resource;

use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;
use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Core\Response\ResponseRepository;
use LTL\Hubspot\Factories\ResourceFactory;
use LTL\Hubspot\Factories\ResponseRepositoryFactory;
use LTL\Hubspot\Resources\ContactHubspot;
use PHPUnit\Framework\TestCase;

class EnumerableTest extends TestCase
{
    private ResourceInterface $resource;

    protected function setUp(): void
    {
        $items = [
            'results' => [
                'a' => 4,
                'b' => 5,
                'c' => null,
                'd' => ['a' => 5],
                'e' => false
            ]
        ];

        $response = $this->getMockBuilder(Response::class)->disableOriginalConstructor()->getMock();
        $response->rawResponse = json_encode($items);
        $response->method('toJson')->willReturn($response->rawResponse);
        $response->method('getIteratorIndex')->willReturn('results');
        
        $ResponseRepository = ResponseRepositoryFactory::build($response);

        $response->method('getIterator')->willReturn($ResponseRepository);

        $this->resource = ResourceFactory::build((new ContactHubspot), $response);
    }

    public function testMapIsCorrect()
    {
        $result = $this->resource->map(function ($item, $key) {
            return $item;
        });

        $this->assertEquals($result, [
            4,
            5,
            null,
            (object) [ 'a' => 5 ],
            false
        ]);
    }

    public function testMapAndFilterIsCorrect()
    {
        $result = $this->resource->mapAndFilter(function ($item, $key) {
            if (is_null($item)) {
                return;
            }

            return $item;
        });

        $this->assertEquals($result, [
            4,
            5,
            (object) [ 'a' => 5 ],
            false
        ]);
    }

    public function testMapWithKeysIsCorrect()
    {
        $result = $this->resource->mapWithKeys(function ($item, $key) {
            return [($key . '::') => $item];
        });

        $this->assertEquals($result, [
            'a::' => 4,
            'b::' => 5,
            'c::' => null,
            'd::' => (object) ['a' => 5],
            'e::' => false
        ]);
    }

    public function testMapWithKeysAndFilterIsCorrect()
    {
        $result = $this->resource->mapWithKeysAndFilter(function ($item, $key) {
            if (is_null($item)) {
                return;
            }

            return [($key . '::') => $item];
        });

        $this->assertEquals($result, [
            'a::' => 4,
            'b::' => 5,
            'd::' => (object) ['a' => 5],
            'e::' => false
        ]);
    }

    public function testFilterIsCorrect()
    {
        $result = $this->resource->filter(function ($item, $key) {
            return $item !== 4;
        });

        $this->assertEquals($result, [
            'b' => 5,
            'c' => null,
            'd' => (object) ['a' => 5],
            'e' => false
        ]);
    }

    public function testMapReduceIsCorrect()
    {
        $result = $this->resource->reduce(function ($before, $item, $key) {
            return ($before === '')?($key):($before .'-'. $key);
        }, '');

        $this->assertEquals($result, 'a-b-c-d-e');
    }
}
