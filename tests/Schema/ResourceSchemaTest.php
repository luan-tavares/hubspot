<?php

namespace LTL\Hubspot\Tests\Schema;

use Error;
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

    public function testIfMAgicMEthodGetIsCorrect()
    {
        $object = SchemaContainer::getAction(new ContactHubspot, 'getAll');

        $this->assertEquals($object->resourceClass, ContactHubspot::class);
    }
}
