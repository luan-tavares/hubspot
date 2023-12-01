<?php

namespace LTL\Hubspot\Tests\Resource;

use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;
use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Factories\ResourceFactory;
use LTL\Hubspot\Factories\ResponseRepositoryFactory;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class EnumerableTest extends TestCase
{
    private ResourceInterface $resource;
    
    private function resource(array $items): ResourceInterface
    {
        $response = $this->getMockBuilder(Response::class)->disableOriginalConstructor()->getMock();
        $response->method('toJson')->willReturn(json_encode($items));
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
        return ResourceFactory::build((new ContactHubspot), $response);
    }

    public function testMapIsCorrect()
    {
        $resource = $this->resource([
            'results' => [
                'a' => 4,
                'b' => 5,
                'd' => ['a' => 5],
            ]
        ]);

        $result = $resource->map(function ($item, $key) {
            return $item;
        });

        $this->assertEquals($result, [
            4,
            5,
            (object) ['a' => 5],
        ]);
    }

    public function testMapAndFilterIsCorrect()
    {
        $resource = $this->resource([
            'results' => [
                'a' => 4,
                'b' => 5,
                'd' => ['a' => 5],
            ]
        ]);

        $result = $resource->mapAndFilter(function ($item, $key) {
            if ($key === 'a') {
                return;
            }

            return $item;
        });

        $this->assertEquals($result, [
            5,
            (object) ['a' => 5],
        ]);
    }

    public function testMapWithKeysIsCorrect()
    {
        $resource = $this->resource([
            'results' => [
                'a' => 4,
                'b' => 5,
                'd' => ['a' => 5],
            ]
        ]);
        
        $result = $resource->mapWithKeys(function ($item, $key) {
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
        $resource = $this->resource([
            'results' => [
                'a' => 4,
                'b' => 5,
                'd' => ['a' => 5],
            ]
        ]);

        $result = $resource->mapWithKeysAndFilter(function ($item, $key) {
            if ($key === 'b') {
                return null;
            }

            return [($key . '::') => $item];
        });

        $this->assertEquals($result, [
            'a::' => 4,
            'd::' => (object) ['a' => 5]
        ]);
    }

    public function testFilterIsCorrect()
    {
        $resource = $this->resource([
            'results' => [
                'a' => 4,
                'b' => 5,
                'd' => ['a' => 5],
            ]
        ]);

        $result = $resource->filter(function ($item, $key) {
            return $item !== 4;
        });

        $this->assertEquals($result, [
            'b' => 5,
            'd' => (object) ['a' => 5]
        ]);
    }

    public function testMapReduceIsCorrect()
    {
        $resource = $this->resource([
            'results' => [
                'a' => 4,
                'b' => 5,
                'd' => ['a' => 5],
            ]
        ]);
        
        $result = $resource->reduce(function ($before, $item, $key) {
            return ($before === '')?($key):($before .'-'. $key);
        }, '');

        $this->assertEquals($result, 'a-b-d');
    }

    public function testEachIsCorrect()
    {
        $resource = $this->resource([
            'results' => [
                'a' => 4,
                'b' => 5,
                'd' => ['a' => 5],
            ]
        ]);
        
        $result = [];

        $resource->each(function ($item, $key) use (&$result) {
            $result[] = $item;
        });

        $this->assertEquals([
            4,
            5,
            (object) ['a' => 5]
        ], $result);
    }
}
