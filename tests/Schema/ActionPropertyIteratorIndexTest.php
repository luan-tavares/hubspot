<?php

namespace LTL\Hubspot\Tests\Schema;

use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Resources\V3\HubDbHubspot;
use PHPUnit\Framework\TestCase;

class ActionPropertyIteratorIndexTest extends TestCase
{
    public function testIfIteratorIndexCastInGetAllHubDbIsCorrect()
    {
        $object = SchemaContainer::getAction(new HubDbHubspot, 'getAll');

        $this->assertEquals(
            $object->iteratorIndex,
            'results'
        );
    }

    public function testIfIteratorIndexCastInPublishHubDbIsCorrect()
    {
        $object = SchemaContainer::getAction(new HubDbHubspot, 'publish');

        $this->assertNull($object->iteratorIndex);
    }
}
