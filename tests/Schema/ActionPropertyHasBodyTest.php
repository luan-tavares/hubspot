<?php

namespace LTL\Hubspot\Tests\Schema;

use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Resources\V3\HubDbHubspot;
use PHPUnit\Framework\TestCase;

class ActionPropertyHasBodyTest extends TestCase
{
    public function testIfHasBodyCastInExportToXlsxHubDbGetMethodIsFalse()
    {
        $object = SchemaContainer::getAction(new HubDbHubspot, 'exportToXlsx');

        $this->assertFalse($object->hasBody);
    }

    public function testIfHasBodyCastInUpdateRowHubDbIsPatchMethodIsTrue()
    {
        $object = SchemaContainer::getAction(new HubDbHubspot, 'updateRow');
        $this->assertTrue($object->hasBody);
    }

    public function testIfHasBodyCastInUnpublishHubDbIsPostMethodIsFalse()
    {
        $object = SchemaContainer::getAction(new HubDbHubspot, 'unpublish');

        $this->assertFalse($object->hasBody);
    }

    public function testIfHasBodyCastInDeletehHubDbIsDeleteMethodIsFalse()
    {
        $object = SchemaContainer::getAction(new HubDbHubspot, 'deleteRow');

        $this->assertFalse($object->hasBody);
    }
}
