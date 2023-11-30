<?php

namespace LTL\Hubspot\Tests\Response;

use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;
use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Factories\ResponseRepositoryFactory;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ResponseRepositoryTest extends TestCase
{
    private MockObject $response;

    private array $result;

    protected function setUp(): void
    {
        $this->result = [
            'a' => 'b',
            'results' => [
                'a' => 4,
                'b' => 5,
                'd' =>  ['b' => 5],
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
        
        /**
         * @var ResponseInterface $response
         */
        $response = $this->response;
        $responseRepository = ResponseRepositoryFactory::build($response);

        foreach ($responseRepository as $value) {
            $return[] = $value;
        }

        $array = json_encode(array_values($this->result['results']));
      
        $this->assertEquals($return, json_decode($array));
    }

    public function testIfCountableObjectIsCorrect()
    {
        $this->response->method('getIteratorIndex')->willReturn('results');
        
        /**
         * @var ResponseInterface $response
         */
        $response = $this->response;
        $responseRepository = ResponseRepositoryFactory::build($response);

        $this->assertEquals(count($responseRepository), count($this->result['results']));
    }

    public function testIfJsonSerializableResponseRepositoryIsCorrect()
    {
        /**
         * @var ResponseInterface $response
         */
        $response = $this->response;
        $responseRepository = ResponseRepositoryFactory::build($response);

        $this->assertEquals(
            json_encode($responseRepository),
            json_encode($this->result)
        );
    }

    public function testIftoArrayResponseRepositoryIsCorrect()
    {
        /**
         * @var ResponseInterface $response
         */
        $response = $this->response;
        $responseRepository = ResponseRepositoryFactory::build($response);

        $this->assertEquals(
            $responseRepository->toArray(),
            $this->result
        );
    }

    public function testIftoJsonSerializableIsCorrect()
    {
        /**
         * @var ResponseInterface $response
         */
        $response = $this->response;
        $responseRepository = ResponseRepositoryFactory::build($response);

        $this->assertEquals(
            json_encode($responseRepository),
            json_encode($this->result)
        );
    }

    public function testIfGetAfterIsCorrect()
    {
        $this->response->method('getIteratorIndex')->willReturn('results');
        $this->response->method('getAfterIndex')->willReturn('after.paging.next');

        /**
         * @var ResponseInterface $response
         */
        $response = $this->response;
        $responseRepository = ResponseRepositoryFactory::build($response);

        $this->assertEquals(
            $responseRepository->after,
            $this->result['after']['paging']['next']
        );
    }

    public function testIfGetMagicMethodResponseRepositoryIsCorrect()
    {
        /**
         * @var ResponseInterface $response
         */
        $response = $this->response;
        $responseRepository = ResponseRepositoryFactory::build($response);
       
        $this->assertEquals(
            $responseRepository->results->a,
            4
        );
    }

    public function testIfIssetMagicMethodResponseRepositoryIsCorrect()
    {
        /**
         * @var ResponseInterface $response
         */
        $response = $this->response;
        $responseRepository = ResponseRepositoryFactory::build($response);
       
        $this->assertEquals(
            isset($responseRepository->results),
            true
        );
    }

    public function testIfNotIterableResponseRepositoryThrowException()
    {
        $this->response->method('getIteratorIndex')->willReturn(null);
        
        /**
         * @var ResponseInterface $response
         */
        $response = $this->response;
        $responseRepository = ResponseRepositoryFactory::build($response);

        $response = mb_strimwidth(json_encode($this->result), 0, 150, ' ...');

        $this->expectExceptionMessage(
            "Resource response is not iterable or countable:\n\n{$response}\n\n"
        );

        foreach ($responseRepository as $value) {
        }
    }

    public function testIfNotCountableResponseRepositoryThrowHubspotApiException()
    {
        $this->response->method('getIteratorIndex')->willReturn(null);

        /**
         * @var ResponseInterface $response
         */
        $response = $this->response;
        $responseRepository = ResponseRepositoryFactory::build($response);

        $this->expectException(HubspotApiException::class);

        count($responseRepository);
    }

    public function testIfNotCountableResponseRepositoryThrowExceptionMessage()
    {
        $this->response->method('getIteratorIndex')->willReturn(null);

        /**
         * @var ResponseInterface $response
         */
        $response = $this->response;
        $responseRepository = ResponseRepositoryFactory::build($response);

        $responseSlice = mb_strimwidth(json_encode($this->result), 0, 150, ' ...');

        $this->expectExceptionMessage(
            "Resource response is not iterable or countable:\n\n{$responseSlice}\n\n"
        );

        count($responseRepository);
    }

    public function testIfArrayResponseTransformInObject()
    {
        $items =[
            ['a' => 1],
            ['a' => 2]
        ];

        $response = $this->getMockBuilder(Response::class)->disableOriginalConstructor()->getMock();
        $response->method('toJson')->willReturn(json_encode($items));

        /**
         * @var ResponseInterface $response
         */
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

        /**
         * @var ResponseInterface $response
         */
        $responseRepository = ResponseRepositoryFactory::build($response);
       
        $this->assertEquals($responseRepository->toArray(), []);
    }

    public function testIfMagicGetMethodReturnNullIfResponseIsNull()
    {
        $response = $this->getMockBuilder(Response::class)->disableOriginalConstructor()->getMock();
        $response->method('toJson')->willReturn('Lorem');

        /**
         * @var ResponseInterface $response
         */
        $responseRepository = ResponseRepositoryFactory::build($response);
       
        $this->assertNull($responseRepository->anotherProperty);
    }

    public function testIfIssetMagicMethodIsFalseIfResponseIsNull()
    {
        $response = $this->getMockBuilder(Response::class)->disableOriginalConstructor()->getMock();
        $response->method('toJson')->willReturn('Lorem');

        /**
         * @var ResponseInterface $response
         */
        $responseRepository = ResponseRepositoryFactory::build($response);
       
        $this->assertFalse(isset($responseRepository->anotherProperty));
    }
}
