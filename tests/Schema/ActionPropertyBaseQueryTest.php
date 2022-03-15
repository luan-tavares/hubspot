<?php

namespace LTL\Hubspot\Tests\Schema;

use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Resources\V1\OAuthHubspot;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use LTL\Hubspot\Resources\V3\HubDbHubspot;
use PHPUnit\Framework\TestCase;

class ActionPropertyBaseQueryTest extends TestCase
{
    public function testIfBaseQueryCastInOAuthMethodIsNull()
    {
        $object = SchemaContainer::getAction(new OAuthHubspot, 'createOrRefresh');

        $this->assertNull($object->baseQuery);
    }

    public function testIfBaseQueryCastInGetByEmailContactIsCorrect()
    {
        $object = SchemaContainer::getAction(new ContactHubspot, 'getByEmail');
  
        $this->assertEquals(
            $object->baseQuery,
            [
                'idProperty' =>'email'
            ]
        );
    }

    public function testIfBaseQueryCastInGetHubDbIsCorrect()
    {
        $object = SchemaContainer::getAction(new HubDbHubspot, 'get');
  
        $this->assertEquals(
            $object->baseQuery,
            [
                'includeForeignIds' => null
            ]
        );
    }
}
