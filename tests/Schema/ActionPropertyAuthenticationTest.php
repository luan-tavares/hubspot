<?php

namespace LTL\Hubspot\Tests\Schema;

use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Resources\V1\OAuthHubspot;
use LTL\Hubspot\Resources\V2\FormHubspot;
use LTL\Hubspot\Resources\V3\HubDbHubspot;
use PHPUnit\Framework\TestCase;

class ActionPropertyAuthenticationTest extends TestCase
{
    public function testIfAuthenticationCastInGetAllHubDbIsCorrect()
    {
        $object = SchemaContainer::getAction(new HubDbHubspot, 'getAll');

        $this->assertTrue($object->authentication);
    }

    public function testIfAuthenticationCastInOAuthGlobalIsCorrect()
    {
        $object = SchemaContainer::getAction(new OAuthHubspot, 'getRefreshToken');

        $this->assertFalse($object->authentication);
    }

    public function testIfAuthenticationCastInSubmitFormLocalIsCorrect()
    {
        $object = SchemaContainer::getAction(new FormHubspot, 'submit');

        $this->assertFalse($object->authentication);
    }
}
