<?php

namespace LTL\Hubspot\Tests\Request;

use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Core\Response\ResponseObject;
use LTL\Hubspot\Exceptions\HubspotApiException;
use PHPUnit\Framework\TestCase;

class ResponseObjectTest extends TestCase
{
    private Response $response;

    protected function setUp(): void
    {
        $items = [
            'index' => [
                'a' => 4,
                'b' => 5,
                'c' => null,
                'd' => ['a' => 5],
                'e' => false
            ]
        ];

        $this->response = $this->getMockBuilder(Response::class)->disableOriginalConstructor()->getMock();
        $this->response->method('toJson')->willReturn(json_encode($items));
    }


    public function testIfIterableObjectIsCorrect()
    {
        $return = [];

        $this->response->index = 'index';
        
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
        $this->response->index = 'index';
        
        $responseObject = new ResponseObject($this->response);

        $this->assertEquals(count($responseObject), 5);
    }

    public function testIfJsonSerializableResponseObjectIsCorrect()
    {
        $responseObject = new ResponseObject($this->response);

        $this->assertEquals(
            json_encode($responseObject),
            '{"index":{"a":4,"b":5,"c":null,"d":{"a":5},"e":false}}'
        );
    }

    public function testIftoArrayResponseObjectIsCorrect()
    {
        $responseObject = new ResponseObject($this->response);

        $this->assertEquals(
            $responseObject->toArray(),
            [
                'index' => [
                    'a' => 4,
                    'b' => 5,
                    'c' => null,
                    'd' => ['a' => 5],
                    'e' => false
                ]
            ]
        );
    }

    public function testIftoJsonResponseObjectIsCorrect()
    {
        $responseObject = new ResponseObject($this->response);

        $this->assertEquals(
            $responseObject->toJson(),
            '{"index":{"a":4,"b":5,"c":null,"d":{"a":5},"e":false}}'
        );
    }

    public function testIfGetMagicMethodResponseObjectIsCorrect()
    {
        $responseObject = new ResponseObject($this->response);
       
        $this->assertEquals(
            $responseObject->index->a,
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
            isset($responseObject->index),
            true
        );
    }

    public function testIfNotIterableResponseObjectThrowException()
    {
        $responseObject = new ResponseObject($this->response);

        $this->expectException(HubspotApiException::class);

        foreach ($responseObject as $value) {
        }
    }

    public function testIfNotCountableResponseObjectThrowException()
    {
        $responseObject = new ResponseObject($this->response);

        $this->expectException(HubspotApiException::class);

        $count = count($responseObject);
    }
}
