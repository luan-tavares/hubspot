<?php

namespace LTL\Hubspot\Tests\Schema;

use Error;
use Exception;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Schema\ActionSchema;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use PHPUnit\Framework\TestCase;

class ResourceSchemaTest extends TestCase
{
    public function testIfActionSchemaCanNotBeIntanciable()
    {
        $this->expectException(Error::class);

        $object = new ActionSchema;
    }

    public function testIfMagicMethodGetIsCorrect()
    {
        $object = SchemaContainer::getAction(new ContactHubspot, 'getAll');

        $this->assertEquals($object->resourceClass, ContactHubspot::class);
    }

    public function testIfMagicMethodGetThrowException()
    {
        $object = SchemaContainer::getAction(new ContactHubspot, 'getAll');

        $this->expectException(Exception::class);

        $object->unknowProperty;
    }

    public function testIfMagicMethodIssetReturnTrue()
    {
        $object = SchemaContainer::getAction(new ContactHubspot, 'getAll');

        $this->assertTrue(isset($object->iteratorIndex));
    }

    public function testIfMagicMethodIssetReturnFalse()
    {
        $object = SchemaContainer::getAction(new ContactHubspot, 'getAll');

        $this->assertFalse(isset($object->unknowProperty));
    }

    public function testIfMagicMethodToStringIsCorrect()
    {
        $object = SchemaContainer::getAction(new ContactHubspot, 'getAll');

        $this->assertEquals("My action is {$object}", 'My action is getAll');
    }

    public function testIfResourceSchemaContainerCountIsCorrect()
    {
        SchemaContainer::get(new ContactHubspot);
        SchemaContainer::destroyAll();
        $a = SchemaContainer::get(new ContactHubspot);
        $a2 = SchemaContainer::get(new ContactHubspot);

        $this->assertEquals(SchemaContainer::count(), 1);
    }
}
