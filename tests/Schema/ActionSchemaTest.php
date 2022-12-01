<?php

namespace LTL\Hubspot\Tests\Schema;

use Exception;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Schema\ActionSchema;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Factories\ActionSchemaFactory;
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
            'merge',
            'createOrUpdate',
            'importAll',
            'createOrUpdateByEmail'
        ]);
    }

    public function testIfGetActionIsCorrect()
    {
        $object = SchemaContainer::get(new ContactHubspot);

        $this->assertIsObject($object->getAction('create'));
    }

    public function testIfGetActionThrowHubspotApiException()
    {
        $object = SchemaContainer::get(new ContactHubspot);

        $this->expectException(HubspotApiException::class);

        $object->getAction('unknowAction');
    }

    public function testIfGetActionThrowHubspotApiExceptionCorrectMessage()
    {
        $resource = new ContactHubspot;

        $action = 'unknowAction';

        $object = SchemaContainer::get($resource);

        $this->expectExceptionMessage($resource::class ."::{$action}() not exists");

        $object->getAction($action);
    }

    public function testIfActionFactoryIsCorrect()
    {
        $resourceSchema = SchemaContainer::get(new ContactHubspot);

        $actionSchema = ActionSchemaFactory::build($resourceSchema, 'get');

        $this->assertEquals($actionSchema->resourceClass, ContactHubspot::class);
    }

    public function testIfMagicMethodGetIsCorrect()
    {
        $object = SchemaContainer::getAction(new ContactHubspot, 'getAll');

        $this->assertEquals($object->resourceClass, ContactHubspot::class);
    }

    public function testIfMagicMethodGetThrowException()
    {
        $object = SchemaContainer::getAction(new ContactHubspot, 'getAll');

        $property = 'unknowProperty';

        $this->expectException(HubspotApiException::class);

        $object->unknowProperty;
    }

    public function testIfMagicMethodGetThrowExceptionMessageIsCorrect()
    {
        $object = SchemaContainer::getAction(new ContactHubspot, 'getAll');

        $property = 'unknowProperty';

        $this->expectExceptionMessage("Property {$property} not exists in ". ActionSchema::class);

        $object->{$property};
    }

    public function testIfMagicMethodIssetReturnTrue()
    {
        $object = SchemaContainer::getAction(new ContactHubspot, 'getAll');

        $this->assertTrue(isset($object->iteratorIndex));
    }
}