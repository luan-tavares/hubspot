<?php

namespace LTL\Hubspot\Tests\Schema;

use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Resources\V1\PropertyDealHubspot;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use PHPUnit\Framework\TestCase;

class ActionPropertyDescriptionTest extends TestCase
{
    public function testIfDescriptionCastInOAuthGetIsNull()
    {
        $object = SchemaContainer::getAction(new PropertyDealHubspot, 'get');

        $this->assertNull($object->description);
    }

    public function testIfDescriptionCastInContactGetIsCorrect()
    {
        $object = SchemaContainer::getAction(new ContactHubspot, 'get');

        $this->assertEquals(
            $object->description,
            'Read an contact identified by {contactIdOrEmail}.'
        );
    }
}
