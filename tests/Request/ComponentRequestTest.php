<?php

namespace LTL\Hubspot\Tests\Request;

use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\BodyBuilder\SearchBuilder\SearchBuilder;
use LTL\Hubspot\Core\Request\Components\MethodRequestComponent;
use LTL\Hubspot\Core\Request\Components\RequestComponent;
use LTL\Hubspot\Core\Request\Components\UriRequestComponent;
use LTL\Hubspot\Core\Request\RequestDefinition;
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
        $requestComponent = new UriRequestComponent;

        $requestComponent->addArrayAfter($this->result);
        
        $this->assertEquals($requestComponent->all(), [
            'a' => 4,
            'b' => 5
        ]);
    }

    public function testDeleteItemIsCorrect()
    {
        $requestComponent = new UriRequestComponent;

        $requestComponent->addArrayAfter($this->result);
        $requestComponent->delete('a');

        $this->assertEquals($requestComponent->all(), [
            'b' => 5
        ]);
    }

    public function testAddItemIsCorrect()
    {
        $requestComponent = new UriRequestComponent;
        
        $requestComponent->addNotNull('a', 5);
        $requestComponent->addNotNull('b', [10]);
        $requestComponent->addNotNull('c', null);

        $this->assertEquals($requestComponent->all(), [
            'a' => 5,
            'b' => [10]
        ]);
    }

    public function testAddItemNullableIsCorrect()
    {
        $requestComponent = new UriRequestComponent;
        
        $requestComponent->add('a');
        $requestComponent->addNotNull('b', null);

        $this->assertEquals($requestComponent->all(), [
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

        $requestDefinition = new RequestDefinition($request, $actionSchema, ['someToken']);

        $this->assertEquals('https://api.hubapi.com/oauth/v1/refresh-tokens/someToken?', $request->getUri());
    }

    public function testIfRequestBodyObjectIsCorrect()
    {
        $resource = new ContactHubspot;

        $request = RequestFactory::build($resource);

        $actionSchema = SchemaContainer::getAction($resource, 'search');

        $requestBody = SearchBuilder::filterHas('id')->properties('name');

        new RequestDefinition($request, $actionSchema, [$requestBody]);

        $this->assertEquals($requestBody->get(), $request->getBody());
    }

    public function testIfRequestComponentBootMethodIsProtected()
    {
        $component = new ReflectionClass(RequestComponent::class);
        
        $this->assertTrue($component->getMethod('boot')->isProtected());
    }

    public function testIfRequestComponentConcreteBootMethodIsProtected()
    {
        $component = new ReflectionClass(MethodRequestComponent::class);
        
        $this->assertTrue($component->getMethod('boot')->isProtected());
    }
}