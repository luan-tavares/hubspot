<?php

namespace LTL\Hubspot\Tests\Schema;

use Error;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Schema\ActionProperties\ActionProperty;
use LTL\Hubspot\Core\Schema\ActionSchema;
use LTL\Hubspot\Resources\V1;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use PHPUnit\Framework\TestCase;
use stdClass;

class ResourceSchemaTest extends TestCase
{
    public function testIfActionSchemaCanNotBeIntanciable()
    {
        $this->expectException(Error::class);

        $object = new ActionSchema;
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

    public function testIfLatestVersionReturnTrue()
    {
        $object = SchemaContainer::get(new ContactHubspot);

        $this->assertTrue($object->getAction('getAll')->isLatestVersion);
    }

    public function testIfLatestVersionReturnFalseInLegacyResource()
    {
        $object = SchemaContainer::get(new V1\ContactHubspot);

        $this->assertFalse($object->getAction('getAll')->isLatestVersion);
    }

    public function testIfActionDocumentationInV1ResourceIsCorrect()
    {
        $expectedDocumentation = 'https://legacydocs.hubspot.com/docs/methods/contacts/get_contacts';

        $object = SchemaContainer::get(new V1\ContactHubspot);

        $this->assertEquals($expectedDocumentation, $object->getAction('getAll')->documentation);
    }

    public function testIfSchemaDocumentationInV1ResourceIsCorrect()
    {
        $object = SchemaContainer::get(new V1\ContactHubspot);

        $this->assertEquals('', $object->getAction('getAll')->schemaDocumentation);
    }

    public function testIfProtectedParsePropertyIsNull()
    {
        $object = new stdClass;
        $object = new class($object) extends ActionProperty {
        };

        $this->assertNull($object->get());
    }
}
