<?php

namespace LTL\Hubspot\Tests\Resource;

use LTL\Curl\Curl;
use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;
use LTL\Hubspot\Core\Response\RequestInfoObject;
use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Factories\ResourceFactory;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use PHPUnit\Framework\TestCase;

class EnumerableTest extends TestCase
{
    private array $requestInfo = [
        'hasObject' => false
    ];

    private function resource(array $items): ResourceInterface
    {
        $curl = $this->getMockBuilder(Curl::class)->getMock();
        $curl->method('response')->willReturn(json_encode($items));
        $curl->method('error')->willReturn(false);

        $requestInfoObject = new RequestInfoObject($this->requestInfo);

        $actionSchema = SchemaContainer::getAction(new ContactHubspot, 'getAll');

        /** @var CurlInterface $curl */
        return ResourceFactory::build($actionSchema, $curl, $requestInfoObject);
    }

    public function testMapIsCorrect()
    {
        $resource = $this->resource([
            'results' => [
                4,
                5,
            ]
        ]);

        $result = $resource->map(function ($item) {
            return $item . '0';
        });

        $this->assertEquals($result, [
            '40',
            '50',
        ]);
    }

    public function testMapAndFilterIsCorrect()
    {
        $expected = [4, 5];

        $resource = $this->resource([
            'results' => [
                4,
                5,
                ['a' => 5],
            ]
        ]);

        $result = $resource->mapAndFilter(function ($item) {
            if (is_object($item)) {
                return;
            }

            return $item;
        });

        $this->assertEquals($expected, $result);
    }

    public function testMapWithKeysIsCorrect()
    {
        $expected = [
            'a::' => 5,
            'b::' => 5,
        ];
        
        $resource = $this->resource([
            'results' => [
                ['a' => 'a', 'b' => 5],
                ['a' => 'b', 'b' => 5],
            ]
        ]);
        
        $result = $resource->mapWithKeys(function ($item, $key) {
            return [($item->a . '::') => $item->b];
        });

        $this->assertEquals($expected, $result);
    }

    public function testMapWithKeysAndFilterIsCorrect()
    {
        $expected = [
            '1::' => 5,
            '2::' => 8
        ];

        $resource = $this->resource([
            'results' => [
                4,
                5,
                8
            ]
        ]);

        $result = $resource->mapWithKeysAndFilter(function ($item, $key) {
            if ($key === 0) {
                return null;
            }

            return [($key . '::') => $item];
        });

        $this->assertEquals($expected, $result);
    }

    public function testFilterIsCorrect()
    {
        $expected = [
            5,
            8
        ];
        
        $resource = $this->resource([
            'results' => [
                4,
                5,
                8
            ]
        ]);

        $result = $resource->filter(function ($item, $key) {
            return $key !== 0;
        });

        $this->assertEquals($expected, array_values($result));
    }

    public function testMapReduceIsCorrect()
    {
        $expected = 17;
        
        $resource = $this->resource([
            'results' => [
                4,
                5,
                8
            ]
        ]);
        
        $result = $resource->reduce(function ($before, $item, $key) {
            return $before + $item;
        }, 0);

        $this->assertEquals($expected, $result);
    }

    public function testEachIsCorrect()
    {
        $expected = [
            4,
            5,
            (object) ['a' => 5]
        ];
        
        $resource = $this->resource([
            'results' => [
                4,
                5,
                ['a' => 5]
            ]
        ]);
        
        $result = [];

        $resource->each(function ($item, $key) use (&$result) {
            $result[] = $item;
        });

        $this->assertEquals($expected, $result);
    }
}
