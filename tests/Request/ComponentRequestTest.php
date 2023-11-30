<?php

namespace LTL\Hubspot\Tests\Request;

use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\BodyBuilder\SearchBuilder\SearchBuilder;
use LTL\Hubspot\Core\Request\Components\AbstractRequestComponent;
use LTL\Hubspot\Core\Request\Components\HeaderRequestComponent;
use LTL\Hubspot\Core\Request\RequestArguments;
use LTL\Hubspot\Core\Request\RequestConnection;
use LTL\Hubspot\Core\Request\RequestUri;
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
        $AbstractRequestComponent = new HeaderRequestComponent;

        $AbstractRequestComponent->addNotNull('eren', 5);
        $AbstractRequestComponent->addArrayAfter($this->result);
        
        $this->assertEquals($AbstractRequestComponent->all(), [
            'eren' => 5,
            'a' => 4,
            'b' => 5
        ]);
    }

    public function testDeleteItemIsCorrect()
    {
        $AbstractRequestComponent = new HeaderRequestComponent;

        $AbstractRequestComponent->addArrayAfter($this->result);
        $AbstractRequestComponent->delete('a');

        $this->assertEquals($AbstractRequestComponent->all(), [
            'b' => 5
        ]);
    }

    public function testAddItemIsCorrect()
    {
        $AbstractRequestComponent = new HeaderRequestComponent;
        
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
        $AbstractRequestComponent = new HeaderRequestComponent;
        
        $AbstractRequestComponent->add('a');
        $AbstractRequestComponent->addNotNull('b', null);

        $this->assertEquals($AbstractRequestComponent->all(), [
            'a' => ''
        ]);
    }

    public function testIfRequestReturnNull()
    {
        $this->assertNull((new HeaderRequestComponent)->request());
    }

    public function testIfNoAuthenticationCallRequestRemoveApiMethod()
    {
        $request = RequestFactory::build(new OAuthHubspot);

        $actionSchema = SchemaContainer::getAction(new OAuthHubspot, 'getRefreshToken');

        $requestArguments = new RequestArguments($actionSchema, ['someToken']);

        RequestConnection::handle($request, $requestArguments);

        $this->assertEquals(
            'https://api.hubapi.com/oauth/v1/refresh-tokens/someToken',
            RequestUri::get($request, $requestArguments)
        );
    }

    public function testIfRequestBodyObjectIsCorrect()
    {
        $resource = new ContactHubspot;

        $request = RequestFactory::build($resource);

        $actionSchema = SchemaContainer::getAction($resource, 'search');

        $requestBody = SearchBuilder::filterHas('id')->properties('name');

        $requestArguments = new RequestArguments($actionSchema, [$requestBody]);

        $this->assertEquals($requestBody->get(), $requestArguments->body());
    }

    public function testIfComponentRegisterMethodIsProtected()
    {
        $component = new ReflectionClass(AbstractRequestComponent::class);
        
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
