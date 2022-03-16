<?php

namespace LTL\Hubspot\Tests\Response;

use LTL\Hubspot\Core\Response\Response;
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
        
        $responseRepository = ResponseRepositoryFactory::build($this->response);

        foreach ($responseRepository as $value) {
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
        
        $responseRepository = ResponseRepositoryFactory::build($this->response);

        $this->assertEquals(count($responseRepository), 5);
    }

    public function testIfJsonSerializableResponseRepositoryIsCorrect()
    {
        $responseRepository = ResponseRepositoryFactory::build($this->response);

        $this->assertEquals(
            json_encode($responseRepository),
            json_encode($this->result)
        );
    }

    public function testIftoArrayResponseRepositoryIsCorrect()
    {
        $responseRepository = ResponseRepositoryFactory::build($this->response);

        $this->assertEquals(
            $responseRepository->toArray(),
            $this->result
        );
    }

    public function testIftoJsonSerializableIsCorrect()
    {
        $responseRepository = ResponseRepositoryFactory::build($this->response);

        $this->assertEquals(
            json_encode($responseRepository),
            json_encode($this->result)
        );
    }

    public function testIfGetAfterIsCorrect()
    {
        $this->response->method('getIteratorIndex')->willReturn('results');
        $this->response->method('getAfterIndex')->willReturn('after.paging.next');

        $responseRepository = ResponseRepositoryFactory::build($this->response);

        $this->assertEquals(
            $responseRepository->after,
            $this->result['after']['paging']['next']
        );
    }

    public function testIfGetMagicMethodResponseRepositoryIsCorrect()
    {
        $responseRepository = ResponseRepositoryFactory::build($this->response);
       
        $this->assertEquals(
            $responseRepository->results->a,
            4
        );
    }

    public function testIfIssetMagicMethodResponseRepositoryIsCorrect()
    {
        $responseRepository = ResponseRepositoryFactory::build($this->response);
       
        $this->assertEquals(
            isset($responseRepository->results),
            true
        );
    }

    public function testIfNotIterableResponseRepositoryThrowException()
    {
        $this->response->method('getIteratorIndex')->willReturn(null);
        
        $responseRepository = ResponseRepositoryFactory::build($this->response);

        $this->expectException(HubspotApiException::class);

        foreach ($responseRepository as $value) {
        }
    }

    public function testIfNotCountableResponseRepositoryThrowException()
    {
        $this->response->method('getIteratorIndex')->willReturn(null);

        $responseRepository = ResponseRepositoryFactory::build($this->response);

        $this->expectException(HubspotApiException::class);

        $count = count($responseRepository);
    }

    public function testIfArrayResponseTransformInObject()
    {
        $items =[
            ['a' => 1],
            ['a' => 2]
        ];

        $response = $this->getMockBuilder(Response::class)->disableOriginalConstructor()->getMock();
        $response->method('toJson')->willReturn(json_encode($items));

        $responseRepository = ResponseRepositoryFactory::build($response);

        $result = [];
        foreach ($responseRepository as $value) {
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

        $responseRepository = ResponseRepositoryFactory::build($response);
       
        $this->assertEquals($responseRepository->toArray(), []);
    }

    public function testIfMagicGetMethodReturnNullIfResponseIsNull()
    {
        $response = $this->getMockBuilder(Response::class)->disableOriginalConstructor()->getMock();
        $response->method('toJson')->willReturn(null);

        $responseRepository = ResponseRepositoryFactory::build($response);
       
        $this->assertNull($responseRepository->anotherProperty);
    }

    public function testIfIssetMagicMethodIsFalseIfResponseIsNull()
    {
        $response = $this->getMockBuilder(Response::class)->disableOriginalConstructor()->getMock();
        $response->method('toJson')->willReturn(null);

        $responseRepository = ResponseRepositoryFactory::build($response);
       
        $this->assertFalse(isset($responseRepository->anotherProperty));
    }
}
