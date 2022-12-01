<?php

namespace LTL\Hubspot\Tests\Request;

use LTL\Curl\Interfaces\CurlInterface;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Handlers\Handlers;
use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Factories\ResourceFactory;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use PHPUnit\Framework\TestCase;

class ContactCreateOrUpdateByEmailHandlerTest extends TestCase
{
    private ContactHubspot $resource;

    protected function setUp(): void
    {
    }

    public function testIfContactCreateOrUpdateByEmailHandlerTestNameIsCorrect()
    {
        $baseResource = new ContactHubspot;
        $actionSchema = SchemaContainer::getAction($baseResource, 'createOrUpdateByEmail');

        $this->assertEquals('contact_create_or_update_by_email', $actionSchema->handler);
    }

    public function testIfHandlerUseCreateISCorrect()
    {
        $result = [
            'id' => 1
        ];

        $baseResource = new ContactHubspot;

        $curl = $this->getMockBuilder(CurlInterface::class)->getMock();
        $curl->method('response')->willReturn(json_encode($result));

        $actionSchema = SchemaContainer::getAction($baseResource, 'create');
        $response = new Response($curl, $actionSchema);
        $resourceCreate = ResourceFactory::build($baseResource, $response);

        $resource = $this->getMockBuilder(ContactHubspot::class)
            ->addMethods(['create'])
            ->getMock();

        $resource->expects($this->once())->method('create')->willReturn($resourceCreate);

        $result = Handlers::call(
            $resource,
            'contact_create_or_update_by_email',
            [
                ['properties'=>['email' => 'lorem@ipsum.com']]
            ]
        );
    }
}