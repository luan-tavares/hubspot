<?php

namespace LTL\Hubspot\Tests\Request;

use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Core\Response\ResponseObject;
use LTL\Hubspot\Exceptions\HubspotApiException;
use PHPUnit\Framework\TestCase;

class ResponseObjectTest extends TestCase
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
        
        $responseObject = new ResponseObject($this->response);

        foreach ($responseObject as $value) {
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
        
        $responseObject = new ResponseObject($this->response);

        $this->assertEquals(count($responseObject), 5);
    }

    public function testIfJsonSerializableResponseObjectIsCorrect()
    {
        $responseObject = new ResponseObject($this->response);

        $this->assertEquals(
            json_encode($responseObject),
            json_encode($this->result)
        );
    }

    public function testIftoArrayResponseObjectIsCorrect()
    {
        $responseObject = new ResponseObject($this->response);

        $this->assertEquals(
            $responseObject->toArray(),
            $this->result
        );
    }

    public function testIftoJsonResponseObjectIsCorrect()
    {
        $responseObject = new ResponseObject($this->response);

        $this->assertEquals(
            $responseObject->toJson(),
            json_encode($this->result)
        );
    }

    public function testIfGetAfterIsCorrect()
    {
        $this->response->method('getIteratorIndex')->willReturn('results');
        $this->response->method('getAfterIndex')->willReturn('after.paging.next');

        $responseObject = new ResponseObject($this->response);

        $this->assertEquals(
            $responseObject->after,
            123456
        );
    }

    public function testIfGetMagicMethodResponseObjectIsCorrect()
    {
        $responseObject = new ResponseObject($this->response);
       
        $this->assertEquals(
            $responseObject->results->a,
            4
        );
    }

    public function testIfGetMagicMethodResponseObjectThrowException()
    {
        $responseObject = new ResponseObject($this->response);

        $this->expectException(HubspotApiException::class);
        
        $property = $responseObject->unknow;
    }

    public function testIfIssetMagicMethodResponseObjectIsCorrect()
    {
        $responseObject = new ResponseObject($this->response);
       
        $this->assertEquals(
            isset($responseObject->results),
            true
        );
    }

    public function testIfNotIterableResponseObjectThrowException()
    {
        $this->response->method('getIteratorIndex')->willReturn(null);
        
        $responseObject = new ResponseObject($this->response);


        $this->expectException(HubspotApiException::class);

        foreach ($responseObject as $value) {
        }
    }

    public function testIfNotCountableResponseObjectThrowException()
    {
        $this->response->method('getIteratorIndex')->willReturn(null);

        $responseObject = new ResponseObject($this->response);

        $this->expectException(HubspotApiException::class);

        $count = count($responseObject);
    }

    public function testIfArrayResponseTranformInObject()
    {
        $items =[
            ['a' => 1],
            ['a' => 2]
        ];

        $response = $this->getMockBuilder(Response::class)->disableOriginalConstructor()->getMock();
        $response->method('toJson')->willReturn(json_encode($items));

        $responseObject = new ResponseObject($response);

        $result = [];
        foreach ($responseObject as $value) {
            $result[] = $value->a;
        }
       
        $this->assertEquals(
            $result,
            [1, 2]
        );
    }
}
