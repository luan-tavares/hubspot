<?php

namespace LTL\Hubspot\Tests\Builder;

use LTL\Curl\Curl;
use LTL\Hubspot\Containers\BuilderContainer;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Globals\ApikeyGlobal;
use LTL\Hubspot\Core\Request\Interfaces\RequestInterface;
use LTL\Hubspot\Core\Request\Request;
use LTL\Hubspot\Core\Response\RequestInfoObject;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Factories\BuilderFactory;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use PHPUnit\Framework\TestCase;

class BuilderTest extends TestCase
{
    protected function setUp(): void
    {
        BuilderContainer::destroyAll();

        ApikeyGlobal::clear();
    }

    public function testIfBuilderThrowExceptionCallResourceMethodBeforeRequest()
    {
        $builder = ContactHubspot::limit(10);

        $this->expectException(HubspotApiException::class);

        $builder->toArray();
    }

    public function testIfBuilderThrowExceptionCallResourceMethodBeforeRequestCorrectMessage()
    {
        $resource = new ContactHubspot;

        $builder = $resource->limit(10);

        $method = 'toArray';

        $this->expectExceptionMessage(
            $resource::class ."::{$method}() must not be used before actions:\n\n". SchemaContainer::get($resource)
        );

        $builder->{$method}();
    }

    public function testIfBuilderCallHandlerIfActionHandlerIsNotNull()
    {
        $resource = new ContactHubspot;

        $requestMock = $this->getMockBuilder(Request::class)->disableOriginalConstructor()->getMock();
        $requestMock->method('getResponseRequest')->willReturn([
            'hasObject' => false,
            'errorIfPropertyExists' => true
        ]);
        $requestMock->expects($this->exactly(1))->method('connect');

        /**
         * @var RequestInterface $requestMock
         */
        $builder = BuilderFactory::build($resource, $requestMock);

        $builder->getAll();
    }

    public function testIfBuilderPassTryCountToResource()
    {
        $resource = new ContactHubspot;

        $curl = $this->getMockBuilder(Curl::class)->disableOriginalConstructor()->getMock();
        $curl->method('status')->willReturn(200);
        $curl->method('response')->willReturn(json_encode(['results' => []]));

        $requestMock = $this->getMockBuilder(Request::class)->disableOriginalConstructor()->getMock();
        $requestMock->method('getResponseRequest')->willReturn([
            'hasObject' => false,
            'errorIfPropertyExists' => true
        ]);
        $requestMock->method('connect')->willReturnCallback(
            function ($actionSchema, $arguments, &$tryCount) use ($curl) {
                $tryCount = 3;

                return $curl;
            }
        );

        /**
         * @var RequestInterface $requestMock
         */
        $builder = BuilderFactory::build($resource, $requestMock);

        $this->assertEquals(3, $builder->getAll()->tryCount());
    }
}
