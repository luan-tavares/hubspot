<?php

namespace LTL\Hubspot\Tests\Schema;

use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Resource\Resource;
use LTL\Hubspot\Resources\ContactHubspot;
use LTL\Hubspot\Resources\HubDbHubspot;
use LTL\Hubspot\Resources\OwnerHubspot;
use PHPUnit\Framework\TestCase;

class ResourceSchemaTest extends TestCase
{
    public function testIfCountableSchemaIsCorrect()
    {
        $resourceStub = $this->getMockBuilder(HubDbHubspot::class)->disableOriginalConstructor()->getMock();

        $resourceStub->method('__toString')->willReturn('hub-db-v3');

        $object = SchemaContainer::get($resourceStub);

        $this->assertEquals(count($object), 32);
    }

    public function testIfIteratorSchemaIsCorrect()
    {
        $resourceStub = $this->getMockBuilder(OwnerHubspot::class)->disableOriginalConstructor()->getMock();

        $resourceStub->method('__toString')->willReturn('owners-v3');

        $object = SchemaContainer::get($resourceStub);

        $result = [];
        foreach ($object as $action => $definition) {
            $result[] = $action;
        }

        $this->assertEquals($result, ['getAll', 'get']);
    }

    public function testIfDocumentationIsCorrect()
    {
        $resourceStub = $this->getMockBuilder(Resource::class)->disableOriginalConstructor()->getMock();

        $resourceStub->method('__toString')->willReturn('contacts-v3');

        $object = SchemaContainer::get($resourceStub);

        $this->assertEquals($object->documentation, 'https://developers.hubspot.com/docs/api/crm/contacts');
    }

    public function testIfMapWithActionsIsCorrect()
    {
        $resourceStub = $this->createMock(Resource::class);

        $resourceStub->method('__toString')->willReturn('owners-v3');

        $object = SchemaContainer::get($resourceStub);

        $this->assertEquals($object->mapWithActions(function ($action) {
            return $action .'()';
        }), [ 'getAll()', 'get()']);
    }

    public function testIfGetActionDefinitionIsCorrect()
    {
        $resourceStub = $this->createMock(ContactHubspot::class);

        $resourceStub->method('__toString')->willReturn('contacts-v3');

        $object = SchemaContainer::get($resourceStub);

        $this->assertEquals((string) $object->getActionDefinition('getAll'), 'getAll');
    }
}
