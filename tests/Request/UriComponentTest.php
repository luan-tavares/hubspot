<?php

namespace LTL\Hubspot\Tests\Request;

use LTL\Hubspot\Core\Request\Components\UriRequestComponent;
use LTL\Hubspot\Core\Request\Request;
use PHPUnit\Framework\TestCase;

class UriComponentTest extends TestCase
{
    protected $object;

    protected function setUp(): void
    {
        $stub = $this->getMockBuilder(Request::class)->disableOriginalConstructor()->getMock();

        $this->object = new UriRequestComponent($stub);
    }

    public function testGenerateUriIsCorrect()
    {
        $baseUri = 'https://domain/resource/{paramA}/{paramB}';

        $associativeParams = [
            '{paramA}' => 'a',
            '{paramB}' => 'b'
        ];

        $queries = [
            'key' => 'hash',
            'properties' => ['a', 'b', 4],
            'email' => 'l@l'
        ];

        $expectedUri = 'https://domain/resource/a/b?key=hash&properties=a&properties=b&properties=4&email=l%40l';

        $this->object->generate($baseUri, $associativeParams, $queries);

        $this->assertEquals($this->object->get(), $expectedUri);
    }

    public function testGenerateUriWithNullQueriesIsCorrect()
    {
        $baseUri = 'https://domain/resource/{paramA}/{paramB}';

        $associativeParams = [
            '{paramA}' => 'a',
            '{paramB}' => 'b'
        ];

        $queries = [ ];

        $expectedUri = 'https://domain/resource/a/b?';

        $this->object->generate($baseUri, $associativeParams, $queries);

        $this->assertEquals($this->object->get(), $expectedUri);
    }
}
