<?php

namespace LTL\Hubspot\Tests\Schema;

use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Resources\V3\HubDbHubspot;
use PHPUnit\Framework\TestCase;

class ActionPropertyResourceClassTest extends TestCase
{
    public function testIfResourceClassCastInGetAllHubDbIsCorrect()
    {
        $object = SchemaContainer::getAction(new HubDbHubspot, 'getAll');

        $this->assertEquals(
            $object->resourceClass,
            HubDbHubspot::class
        );
    }
}
