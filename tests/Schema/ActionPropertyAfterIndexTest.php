<?php

namespace LTL\Hubspot\Tests\Schema;

use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Resources\V1\OAuthHubspot;
use LTL\Hubspot\Resources\V2\FormHubspot;
use LTL\Hubspot\Resources\V3\HubDbHubspot;
use PHPUnit\Framework\TestCase;

class ActionSchemaAfterIndexTest extends TestCase
{
    public function testIfAfterIndexCastInGetAllHubDbIsCorrect()
    {
        $object = SchemaContainer::getAction(new HubDbHubspot, 'getAll');

        $this->assertEquals(
            $object->afterIndex,
            'paging.next.after'
        );
    }

    public function testIfAfterIndexCastInPublishHubDbIsCorrect()
    {
        $object = SchemaContainer::getAction(new HubDbHubspot, 'publish');

        $this->assertNull($object->afterIndex);
    }
}
