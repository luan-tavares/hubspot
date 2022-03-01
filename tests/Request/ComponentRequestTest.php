<?php

namespace LTL\Hubspot\Tests\Request;

use LTL\Hubspot\Core\Request\Components\UriRequestComponent;
use PHPUnit\Framework\TestCase;

class ComponentRequestTest extends TestCase
{
    private $result;

    protected function setUp(): void
    {
        $this->result = [
            'a' => 4,
            'b' => 5,
            'c' => null
        ];
    }

    public function testAddArrayIsCorrect()
    {
        $requestComponent = new UriRequestComponent;

        $requestComponent->addArray($this->result);
        
        $this->assertEquals($requestComponent->all(), [
            'a' => 4,
            'b' => 5
        ]);
    }

    public function testDeleteItemIsCorrect()
    {
        $requestComponent = new UriRequestComponent;

        $requestComponent->addArray($this->result);
        $requestComponent->delete('a');

        $this->assertEquals($requestComponent->all(), [
            'b' => 5
        ]);
    }

    public function testAddItemIsCorrect()
    {
        $requestComponent = new UriRequestComponent;
        
        $requestComponent->add('a', 5);
        $requestComponent->add('b', [10]);

        $this->assertEquals($requestComponent->all(), [
            'a' => 5,
            'b' => [10]
        ]);
    }

    public function testIfRequestReturnNull()
    {
        $this->assertNull((new UriRequestComponent)->request());
    }
}
