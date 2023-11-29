<?php

namespace LTL\Hubspot\Tests\Request;

use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Interfaces\Request\RequestInterface;
use LTL\Hubspot\Core\Request\Request;
use LTL\Hubspot\Core\Request\RequestArguments;
use LTL\Hubspot\Core\Request\RequestUri;
use LTL\Hubspot\Resources\V1\OAuthHubspot;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class UriRequestTest extends TestCase
{
    protected MockObject $request;

    protected function setUp(): void
    {
        $this->request = $this->getMockBuilder(Request::class)->disableOriginalConstructor()->getMock();
        $this->request->method('removeApiKey')->willReturn($this->request);
    }

    public function testGenerateUriIsCorrect()
    {
        $arguments = ['123456', [
            'test' => 123
        ]];

        $this->request->method('getQueries')->willReturn([
            'email' => 'email@email.com',
            'property__has_value' => ''
        ]);

        $expectedUri = 'https://api.hubapi.com/crm/v3/objects/contacts/123456?email=email%40email.com&property__has_value=';

        $actionSchema = SchemaContainer::getAction(new ContactHubspot, 'update');

        $requestArguments = new RequestArguments($actionSchema, $arguments);

        /**
         * @var RequestInterface $request
         */
        $request = $this->request;

        $this->assertEquals(
            $expectedUri,
            RequestUri::get($request, $requestArguments)
        );
    }

    public function testGenerateUriWithNullQueriesIsCorrect()
    {
        $arguments = ['123456', [
            'test' => 123
        ]];

        $expectedUri = 'https://api.hubapi.com/crm/v3/objects/contacts/123456';

        $this->request->method('getQueries')->willReturn([]);

        $actionSchema = SchemaContainer::getAction(new ContactHubspot, 'update');

        $requestArguments = new RequestArguments($actionSchema, $arguments);

        /**
         * @var RequestInterface $request
         */
        $request = $this->request;

        $this->assertEquals(
            $expectedUri,
            RequestUri::get($request, $requestArguments)
        );
    }

    public function testGenerateUriWithoutAuthenticationIsCorrect()
    {
        $arguments = ['123456'];

        $actionSchema = SchemaContainer::getAction(new OAuthHubspot, 'getRefreshToken');

        $requestArguments = new RequestArguments($actionSchema, $arguments);

        $this->request->expects($this->once())
            ->method('removeApikey');

        /**
         * @var RequestInterface $request
         */
        $request = $this->request;

        RequestUri::get($request, $requestArguments);
    }
}
