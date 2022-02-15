<?php

namespace LTL\Hubspot\Tests\Services;

use LTL\Hubspot\Services\Curl\Curl;
use LTL\Hubspot\Services\Curl\CurlResponseHeader;
use PHPUnit\Framework\TestCase;
use ReflectionProperty;

class CurlTest extends TestCase
{
    protected $curl;

    private $body;

    protected function setUp(): void
    {
        $this->curl = (new Curl('test'));
        
        $this->body = ['a' => 1, 'b' => 2, 'c' => [1,2], 'd'=> null];
    }

    private function invokeCurlMethod(string $method, array $arguments = [])
    {
        $class = new \ReflectionClass(Curl::class);
        $method = $class->getMethod($method);
        $method->setAccessible(true);

        return $method->invoke($this->curl, $arguments);
    }

    private function getCurlProperty(string $property)
    {
        $property = new ReflectionProperty($this->curl, $property);
        
        return $property->getValue($this->curl);
    }

    public function testFormUrlEncodedHeaderWithBody()
    {
        $this->curl->addHeaders(['Content-Type' => 'application/x-www-form-urlencoded']);

        $this->invokeCurlMethod('resolveBody', $this->body);

        $params = $this->getCurlProperty('params');
        
        $this->assertEquals($params[CURLOPT_POSTFIELDS], 'a=1&b=2&c%5B0%5D=1&c%5B1%5D=2');
    }

    public function testJsonEncodeHeaderWithBody()
    {
        $this->invokeCurlMethod('resolveBody', $this->body);

        $params = $this->getCurlProperty('params');
        
        $this->assertEquals($params[CURLOPT_POSTFIELDS], '{"a":1,"b":2,"c":[1,2],"d":null}');
    }

    public function testMultipartFormDataWithBody()
    {
        $this->curl->addHeaders(['Content-Type' => 'multipart/form-data']);

        $this->invokeCurlMethod('resolveBody', $this->body);

        $params = $this->getCurlProperty('params');

        
        $this->assertEquals($params[CURLOPT_POSTFIELDS], [
            'a' => 1,
            'b' => 2,
            'c' =>  [
                0 => 1,
                1 => 2
            ],
            'd' => null
        ]);
    }

    public function testHeaderFormat()
    {
        $this->curl->addHeaders(['Content-Type' => 'multipart/form-data', 'accept' => 'application/json', 'a']);

        $this->invokeCurlMethod('resolveHeader');

        $params = $this->getCurlProperty('params');
        
        $this->assertEquals($params[CURLOPT_HTTPHEADER], [
            'Content-Type: multipart/form-data',
            'accept: application/json',
            'a'
        ]);
    }

    public function testResponseHeaderIsFormatted()
    {
        $headerResponse = new CurlResponseHeader("a: v\r\nteste\r\nk: h");
        
        $this->assertEquals($headerResponse->get(), [
            'a' => 'v',
            'k' => 'h'
        ]);
    }
}
