<?php

namespace LTL\Hubspot\Tests\Request;

use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Request\Components\UriRequestComponent;
use LTL\Hubspot\Core\Request\Request;
use LTL\Hubspot\Resources\V1\OAuthHubspot;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use PHPUnit\Framework\TestCase;

class UriComponentTest extends TestCase
{
    protected $request;

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

        $uriComponent = new UriRequestComponent($this->request);

        $actionSchema = SchemaContainer::getAction(new ContactHubspot, 'update');

        $uriComponent->create($actionSchema, $arguments);

        $this->assertEquals($expectedUri, $uriComponent->get());
    }

    public function testGenerateUriWithNullQueriesIsCorrect()
    {
        $arguments = ['123456', [
            'test' => 123
        ]];

        $expectedUri = 'https://api.hubapi.com/crm/v3/objects/contacts/123456?';

        $this->request->method('getQueries')->willReturn([]);

        $uriComponent = new UriRequestComponent($this->request);

        $actionSchema = SchemaContainer::getAction(new ContactHubspot, 'update');

        $uriComponent->create($actionSchema, $arguments);

        $this->assertEquals($expectedUri, $uriComponent->get());
    }

    public function testGenerateUriWithoutAuthenticationIsCorrect()
    {
        $arguments = ['123456'];

        $expectedUri = 'https://api.hubapi.com/crm/v3/objects/contacts/123456?';


        $uriComponent = new UriRequestComponent($this->request);

        $actionSchema = SchemaContainer::getAction(new OAuthHubspot, 'getRefreshToken');

        $this->request->expects($this->once())
            ->method('removeApikey');

        $uriComponent->create($actionSchema, $arguments);
    }
}
