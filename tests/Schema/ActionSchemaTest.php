<?php

namespace LTL\Hubspot\Tests\Schema;

use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Resources\ContactHubspot;
use LTL\Hubspot\Resources\OwnerHubspot;
use PHPUnit\Framework\TestCase;

class ActionSchemaTest extends TestCase
{
    public function testIfToStringMagicMethodIsCorrect()
    {
        $object = SchemaContainer::get(new OwnerHubspot);

        $this->assertEquals(
            (string) $object,
            '- '. OwnerHubspot::class ."::getAll()\n- ". OwnerHubspot::class ."::get()\n\n"
        );
    }

    public function testIfGetActionDefinitionIsCorrect()
    {
        $object = SchemaContainer::get(new ContactHubspot);

        $this->assertEquals($object->getActionDefinition('getAll')->resourceClass, ContactHubspot::class);
    }

    public function testIfGetActionsIsCorrect()
    {
        $object = SchemaContainer::get(new ContactHubspot);

        $this->assertEquals($object->getActions(), [
            'getAll',
            'get',
            'getByEmail',
            'create',
            'update',
            'delete',
            'gdprDelete',
            'getAssociations',
            'createAssociation',
            'removeAssociation',
            'batchDelete',
            'batchCreate',
            'batchRead',
            'batchUpdate',
            'search',
        ]);
    }

    public function testIfGetActionIsCorrect()
    {
        $object = SchemaContainer::get(new ContactHubspot);

        $this->assertIsObject($object->getAction('create'));
    }

    public function testIfGetActionThrowException()
    {
        $object = SchemaContainer::get(new ContactHubspot);

        $this->expectException(HubspotApiException::class);

        $object->getAction('unknowAction');
    }
}
