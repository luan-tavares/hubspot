<?php

namespace LTL\Hubspot\Tests\Schema;

use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Resources\ContactHubspot;
use LTL\Hubspot\Resources\HubDbHubspot;
use LTL\Hubspot\Resources\OwnerHubspot;
use PHPUnit\Framework\TestCase;

class ResourceSchemaTest extends TestCase
{
    public function testIfCountableSchemaIsCorrect()
    {
        $object = SchemaContainer::get(new HubDbHubspot);

        $this->assertEquals(count($object), 32);
    }

    public function testIfIteratorSchemaIsCorrect()
    {
        $object = SchemaContainer::get(new OwnerHubspot);

        $result = [];
        foreach ($object as $action => $definition) {
            $result[] = $action;
        }

        $this->assertEquals($result, ['getAll', 'get']);
    }

    public function testIfDocumentationIsCorrect()
    {
        $object = SchemaContainer::get(new ContactHubspot);

        $this->assertEquals($object->documentation, 'https://developers.hubspot.com/docs/api/crm/contacts');
    }

    public function testIfToStringMagicMethodIsCorrect()
    {
        $object = SchemaContainer::get(new OwnerHubspot);

        $this->assertEquals(
            (string) $object,
            '- '. OwnerHubspot::class ."::getAll()\n- ". OwnerHubspot::class ."::get()\n\n"
        );
    }

    public function testIfGetActionDefinitionIsCorrect()
    {
        $object = SchemaContainer::get(new ContactHubspot);

        $this->assertEquals($object->getActionDefinition('getAll')->resourceClass, ContactHubspot::class);
    }
}
