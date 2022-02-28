<?php

namespace LTL\Hubspot\Tests\Request;

use LTL\Hubspot\Core\Request\Components\UriRequestComponent;
use LTL\Hubspot\Core\Resource\Resource;
use PHPUnit\Framework\TestCase;

class ComponentRequestTest extends TestCase
{
    protected $object;

    private $items;

    protected function setUp(): void
    {
        $stub = $this->getMockBuilder(Resource::class)->disableOriginalConstructor()->getMock();

        $this->object = new UriRequestComponent($stub);

        $this->result = [
            'a' => 4,
            'b' => 5,
            'c' => null
        ];
    }

    public function testAddArrayIsCorrect()
    {
        $this->object->addArray($this->result);
        
        $this->assertEquals($this->object->all(), [
            'a' => 4,
            'b' => 5
        ]);
    }

    public function testDeleteItemIsCorrect()
    {
        $this->object->addArray($this->result);
        $this->object->delete('a');

        $this->assertEquals($this->object->all(), [
            'b' => 5
        ]);
    }

    public function testAddItemIsCorrect()
    {
        $this->object->add('a', 5);
        $this->object->add('b', [10]);

        $this->assertEquals($this->object->all(), [
            'a' => 5,
            'b' => [10]
        ]);
    }
}
