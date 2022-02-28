<?php

namespace LTL\Hubspot\Tests\Request;

use LTL\Hubspot\Core\Interfaces\Request\RequestInterface;
use LTL\Hubspot\Core\Request\Components\UriRequestComponent;
use LTL\Hubspot\Core\Request\Request;
use PHPUnit\Framework\TestCase;

class ComponentRequestTest extends TestCase
{
    protected RequestInterface $request;

    private $items;

    protected function setUp(): void
    {
        $this->request =  $this->getMockBuilder(Request::class)->disableOriginalConstructor()->getMock();

        $this->result = [
            'a' => 4,
            'b' => 5,
            'c' => null
        ];
    }

    public function testAddArrayIsCorrect()
    {
        $requestComponent = new UriRequestComponent($this->request);

        $requestComponent->addArray($this->result);
        
        $this->assertEquals($requestComponent->all(), [
            'a' => 4,
            'b' => 5
        ]);
    }

    public function testDeleteItemIsCorrect()
    {
        $requestComponent = new UriRequestComponent($this->request);

        $requestComponent->addArray($this->result);
        $requestComponent->delete('a');

        $this->assertEquals($requestComponent->all(), [
            'b' => 5
        ]);
    }

    public function testAddItemIsCorrect()
    {
        $requestComponent = new UriRequestComponent($this->request);
        
        $requestComponent->add('a', 5);
        $requestComponent->add('b', [10]);

        $this->assertEquals($requestComponent->all(), [
            'a' => 5,
            'b' => [10]
        ]);
    }
}
