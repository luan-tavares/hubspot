<?php

namespace LTL\Hubspot\Tests\Schema;

use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Resources\V3\HubDbHubspot;
use PHPUnit\Framework\TestCase;

class ActionPropertyMethodTest extends TestCase
{
    public function testIfMethodCastInGetAllHubDbIsCorrect()
    {
        $object = SchemaContainer::getAction(new HubDbHubspot, 'getAll');

        $this->assertEquals(
            $object->method,
            'GET'
        );
    }

    public function testIfMethodCastInPublishHubDbIsCorrect()
    {
        $object = SchemaContainer::getAction(new HubDbHubspot, 'publish');

        $this->assertEquals(
            $object->method,
            'POST'
        );
    }
}
