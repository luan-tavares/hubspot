<?php

namespace LTL\Hubspot\Tests\Response;

use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Core\Response\ResponseRepository;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Factories\ResponseRepositoryFactory;
use PHPUnit\Framework\TestCase;

class ResponseRepositoryTest extends TestCase
{
    private Response $response;

    private array $result;

    protected function setUp(): void
    {
        $this->result = [
            'results' => [
                'a' => 4,
                'b' => 5,
                'c' => null,
                'd' => ['a' => 5],
                'e' => false
            ],
            'after' => [
                'paging' => [
                    'next' => 123456
                ]
            ]
        ];

        $this->response = $this->getMockBuilder(Response::class)->disableOriginalConstructor()->getMock();
        $this->response->method('toJson')->willReturn(json_encode($this->result));
    }


    public function testIfIterableObjectIsCorrect()
    {
        $this->response->method('getIteratorIndex')->willReturn('results');
        
        $return = [];
        
        $ResponseRepository = ResponseRepositoryFactory::build($this->response);

        foreach ($ResponseRepository as $value) {
            $return[] = $value;
        }
      
        $this->assertEquals($return, [
            4,
            5,
            null,
            (object) [ 'a' => 5 ],
            false
        ]);
    }

    public function testIfCountableObjectIsCorrect()
    {
        $this->response->method('getIteratorIndex')->willReturn('results');
        
        $ResponseRepository = ResponseRepositoryFactory::build($this->response);

        $this->assertEquals(count($ResponseRepository), 5);
    }

    public function testIfJsonSerializableResponseRepositoryIsCorrect()
    {
        $ResponseRepository = ResponseRepositoryFactory::build($this->response);

        $this->assertEquals(
            json_encode($ResponseRepository),
            json_encode($this->result)
        );
    }

    public function testIftoArrayResponseRepositoryIsCorrect()
    {
        $ResponseRepository = ResponseRepositoryFactory::build($this->response);

        $this->assertEquals(
            $ResponseRepository->toArray(),
            $this->result
        );
    }

    public function testIftoJsonSerializableIsCorrect()
    {
        $ResponseRepository = ResponseRepositoryFactory::build($this->response);

        $this->assertEquals(
            json_encode($ResponseRepository),
            json_encode($this->result)
        );
    }

    public function testIfGetAfterIsCorrect()
    {
        $this->response->method('getIteratorIndex')->willReturn('results');
        $this->response->method('getAfterIndex')->willReturn('after.paging.next');

        $ResponseRepository = ResponseRepositoryFactory::build($this->response);

        $this->assertEquals(
            $ResponseRepository->after,
            $this->result['after']['paging']['next']
        );
    }

    public function testIfGetMagicMethodResponseRepositoryIsCorrect()
    {
        $ResponseRepository = ResponseRepositoryFactory::build($this->response);
       
        $this->assertEquals(
            $ResponseRepository->results->a,
            4
        );
    }

    public function testIfGetMagicMethodResponseRepositoryThrowException()
    {
        $ResponseRepository = ResponseRepositoryFactory::build($this->response);

        $this->expectException(HubspotApiException::class);
        
        $property = $ResponseRepository->unknow;
    }

    public function testIfIssetMagicMethodResponseRepositoryIsCorrect()
    {
        $ResponseRepository = ResponseRepositoryFactory::build($this->response);
       
        $this->assertEquals(
            isset($ResponseRepository->results),
            true
        );
    }

    public function testIfNotIterableResponseRepositoryThrowException()
    {
        $this->response->method('getIteratorIndex')->willReturn(null);
        
        $ResponseRepository = ResponseRepositoryFactory::build($this->response);

        $this->expectException(HubspotApiException::class);

        foreach ($ResponseRepository as $value) {
        }
    }

    public function testIfNotCountableResponseRepositoryThrowException()
    {
        $this->response->method('getIteratorIndex')->willReturn(null);

        $ResponseRepository = ResponseRepositoryFactory::build($this->response);

        $this->expectException(HubspotApiException::class);

        $count = count($ResponseRepository);
    }

    public function testIfArrayResponseTransformInObject()
    {
        $items =[
            ['a' => 1],
            ['a' => 2]
        ];

        $response = $this->getMockBuilder(Response::class)->disableOriginalConstructor()->getMock();
        $response->method('toJson')->willReturn(json_encode($items));

        $ResponseRepository = ResponseRepositoryFactory::build($response);

        $result = [];
        foreach ($ResponseRepository as $value) {
            $result[] = $value->a;
        }
       
        $this->assertEquals(
            $result,
            [1, 2]
        );
    }

    public function testIfCommomStringTransformEmptyArray()
    {
        $response = $this->getMockBuilder(Response::class)->disableOriginalConstructor()->getMock();
        $response->method('toJson')->willReturn('<h1>Error 404</h1>');

        $ResponseRepository = ResponseRepositoryFactory::build($response);
       
        $this->assertEquals($ResponseRepository->toArray(), []);
    }
}
