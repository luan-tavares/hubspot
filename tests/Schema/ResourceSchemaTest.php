<?php

namespace LTL\Hubspot\Tests\Schema;

use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Resources\ContactHubspot;
use LTL\Hubspot\Resources\OwnerHubspot;
use PHPUnit\Framework\TestCase;

class ResourceSchemaTest extends TestCase
{
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
