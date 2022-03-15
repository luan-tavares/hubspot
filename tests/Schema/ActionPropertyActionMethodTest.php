<?php

namespace LTL\Hubspot\Tests\Schema;

use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use LTL\Hubspot\Resources\V3\HubDbHubspot;
use PHPUnit\Framework\TestCase;

class ActionPropertyActionMethodTest extends TestCase
{
    public function testIfActionNotExistsThrowException()
    {
        $this->expectException(HubspotApiException::class);

        $object = SchemaContainer::getAction(new HubDbHubspot, 'unknowAction');
    }

    public function testIfActionPropertyCastInPublishHubDbIsCorrect()
    {
        $object = SchemaContainer::getAction(new HubDbHubspot, 'publish');

        $this->assertEquals(
            $object->action,
            'publish'
        );
    }

    public function testIfActionPropertyCastInGetAllContactIsCorrect()
    {
        $object = SchemaContainer::getAction(new ContactHubspot, 'getAll');

        $this->assertEquals(
            $object->action,
            'getAll'
        );
    }
}
