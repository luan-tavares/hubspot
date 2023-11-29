<?php

namespace LTL\Hubspot\Tests\Resource;

use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;
use LTL\Hubspot\Core\Interfaces\Response\ResponseInterface;
use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Factories\ResourceFactory;
use LTL\Hubspot\Factories\ResponseRepositoryFactory;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class EnumerableTest extends TestCase
{
    private ResourceInterface $resource;

    private array $items;

    protected function setUp(): void
    {
        $this->items = [
            'results' => [
                'a' => 4,
                'b' => 5,
                'd' => ['a' => 5],
            ]
        ];

        $response = $this->getMockBuilder(Response::class)->disableOriginalConstructor()->getMock();
        $response->rawResponse = json_encode($this->items);
        $response->method('toJson')->willReturn($response->rawResponse);
        $response->method('getIteratorIndex')->willReturn('results');
        
        /**
         * @var ResponseInterface $response
         */
        $ResponseRepository = ResponseRepositoryFactory::build($response);

        /**
         * @var MockObject $response
         */
        $response->method('getIterator')->willReturn($ResponseRepository);

        /**
         * @var ResponseInterface $response
         */
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
            (object) [ 'a' => 5 ],
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
            'd::' => (object) ['a' => 5],
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
            'd::' => (object) ['a' => 5]
        ]);
    }

    public function testFilterIsCorrect()
    {
        $result = $this->resource->filter(function ($item, $key) {
            return $item !== 4;
        });

        $this->assertEquals($result, [
            'b' => 5,
            'd' => (object) ['a' => 5]
        ]);
    }

    public function testMapReduceIsCorrect()
    {
        $result = $this->resource->reduce(function ($before, $item, $key) {
            return ($before === '')?($key):($before .'-'. $key);
        }, '');

        $this->assertEquals($result, 'a-b-d');
    }

    public function testEachIsCorrect()
    {
        $result = [];

        $this->resource->each(function ($item, $key) use (&$result) {
            $result[] = $item;
        });

        $this->assertEquals([
            4,
            5,
            (object) [ 'a' => 5 ]
        ], $result);
    }
}
