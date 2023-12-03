<?php

namespace LTL\Hubspot\Tests\Request;

use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Request\RequestArguments;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use LTL\Hubspot\Resources\V3\ListHubspot;
use PHPUnit\Framework\TestCase;

class RequestArgumentsTest extends TestCase
{
    protected function setUp(): void
    {
    }

    public function testIfParamsIsCorrect()
    {
        $arguments = [155545, ['properties' => 'a']];

        $baseResource = new ContactHubspot;
        $actionSchema = SchemaContainer::getAction($baseResource, 'update');

        $requestArguments = new RequestArguments($actionSchema, $arguments);

        $this->assertEquals(['{contactIdOrEmail}' => 155545], $requestArguments->params());
    }

    public function testIfQueryAsParamsIsCorrect()
    {
        $arguments = [155545, 'name'];

        $expected = ['listName' => 'name'];

        $baseResource = new ListHubspot;
        $actionSchema = SchemaContainer::getAction($baseResource, 'updateName');

        $requestArguments = new RequestArguments($actionSchema, $arguments);

        $this->assertEquals($expected, $requestArguments->queriesAsParams());
    }

    public function testIfWrongCountThrowException()
    {
        $arguments = [155545, 'name', 5];

        $baseResource = new ListHubspot;
        $actionSchema = SchemaContainer::getAction($baseResource, 'updateName');

        $this->expectException(HubspotApiException::class);

        new RequestArguments($actionSchema, $arguments);
    }

    public function testIfWrongParamTypeThrowException()
    {
        $arguments = [[], 'name'];

        $baseResource = new ListHubspot;
        $actionSchema = SchemaContainer::getAction($baseResource, 'updateName');

        $this->expectException(HubspotApiException::class);

        new RequestArguments($actionSchema, $arguments);
    }

    public function testIfWrongQueryAsParamTypeThrowException()
    {
        $arguments = ['111', []];

        $baseResource = new ListHubspot;
        $actionSchema = SchemaContainer::getAction($baseResource, 'updateName');

        $this->expectException(HubspotApiException::class);

        new RequestArguments($actionSchema, $arguments);
    }


}
