<?php

namespace LTL\Hubspot\Tests\Request;

use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\BodyBuilder\SearchBuilder\SearchBuilder;
use LTL\Hubspot\Core\Request\Components\AbstractRequestComponent;
use LTL\Hubspot\Core\Request\Components\MethodRequestComponent;
use LTL\Hubspot\Core\Request\Components\UriRequestComponent;
use LTL\Hubspot\Core\Request\RequestArguments;
use LTL\Hubspot\Core\Request\RequestConnection;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Factories\RequestFactory;
use LTL\Hubspot\Resources\V1\OAuthHubspot;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

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
        $AbstractRequestComponent = new UriRequestComponent;

        $AbstractRequestComponent->addArrayAfter($this->result);
        
        $this->assertEquals($AbstractRequestComponent->all(), [
            'a' => 4,
            'b' => 5
        ]);
    }

    public function testDeleteItemIsCorrect()
    {
        $AbstractRequestComponent = new UriRequestComponent;

        $AbstractRequestComponent->addArrayAfter($this->result);
        $AbstractRequestComponent->delete('a');

        $this->assertEquals($AbstractRequestComponent->all(), [
            'b' => 5
        ]);
    }

    public function testAddItemIsCorrect()
    {
        $AbstractRequestComponent = new UriRequestComponent;
        
        $AbstractRequestComponent->addNotNull('a', 5);
        $AbstractRequestComponent->addNotNull('b', [10]);
        $AbstractRequestComponent->addNotNull('c', null);

        $this->assertEquals($AbstractRequestComponent->all(), [
            'a' => 5,
            'b' => [10]
        ]);
    }

    public function testAddItemNullableIsCorrect()
    {
        $AbstractRequestComponent = new UriRequestComponent;
        
        $AbstractRequestComponent->add('a');
        $AbstractRequestComponent->addNotNull('b', null);

        $this->assertEquals($AbstractRequestComponent->all(), [
            'a' => ''
        ]);
    }

    public function testIfRequestReturnNull()
    {
        $this->assertNull((new UriRequestComponent)->request());
    }

    public function testIfNoAuthenticationCallRequestRemoveApiMethod()
    {
        $request = RequestFactory::build(new OAuthHubspot);

        $actionSchema = SchemaContainer::getAction(new OAuthHubspot, 'getRefreshToken');

        $requestArguments = new RequestArguments($actionSchema, ['someToken']);

        RequestConnection::handle($request, $requestArguments);

        $this->assertEquals('https://api.hubapi.com/oauth/v1/refresh-tokens/someToken?', $request->getUri());
    }

    public function testIfRequestBodyObjectIsCorrect()
    {
        $resource = new ContactHubspot;

        $request = RequestFactory::build($resource);

        $actionSchema = SchemaContainer::getAction($resource, 'search');

        $requestBody = SearchBuilder::filterHas('id')->properties('name');

        RequestConnection::handle($request, new RequestArguments($actionSchema, [$requestBody]));

        $this->assertEquals($requestBody->get(), $request->getBody());
    }

    public function testIfComponentRegisterMethodIsProtected()
    {
        $component = new ReflectionClass(AbstractRequestComponent::class);
        
        $this->assertTrue($component->getMethod('register')->isProtected());
    }

    public function testIfComponentRegisterChildMethodIsProtected()
    {
        $component = new ReflectionClass(MethodRequestComponent::class);
        
        $this->assertTrue($component->getMethod('register')->isProtected());
    }

    public function testIfRequestUriDiffParamsThrowException()
    {
        $resource = new ContactHubspot;

        $request = RequestFactory::build($resource);

        $actionSchema = SchemaContainer::getAction($resource, 'update');

        $this->expectException(HubspotApiException::class);

        new RequestArguments($actionSchema, [1, 2, [5]]);
    }
}
