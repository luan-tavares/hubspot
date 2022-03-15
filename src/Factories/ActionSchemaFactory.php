<?php

namespace LTL\Hubspot\Factories;

use LTL\Hubspot\Containers\SingletonContainer;
use LTL\Hubspot\Core\Interfaces\Schemas\ActionSchemaInterface;
use LTL\Hubspot\Core\Interfaces\Schemas\ResourceSchemaInterface;
use LTL\Hubspot\Core\Schema\ActionSchema;
use LTL\Hubspot\Exceptions\HubspotApiException;
use ReflectionClass;
use ReflectionProperty;
use RuntimeException;

abstract class ActionSchemaFactory
{
    public static function build(string $action, ResourceSchemaInterface $schema): ActionSchemaInterface
    {
        try {
            $actionSchema = $schema->actions[$action];
        } catch (RuntimeException $error) {
            throw new HubspotApiException("{$schema->resourceClass}::{$action}() not exists");
        }

        $reflectionClass = SingletonContainer::get(ActionSchema::class, function ($class) {
            return new ReflectionClass($class);
        });

        $object = $reflectionClass->newInstanceWithoutConstructor();

        $reflectionClass->getProperty('action')->setValue($object, $action);

        $reflectionPropertyList = $reflectionClass->getProperties(ReflectionProperty::IS_PRIVATE);

        foreach ($reflectionPropertyList as $reflectionProperty) {
            $value = self::castProperty($actionSchema, $schema, $reflectionProperty);
           
            $reflectionProperty->setValue($object, $value);
        }

        return $object;
    }

    private static function castProperty(object $actionSchema, ResourceSchemaInterface $schema, ReflectionProperty $reflectionProperty): mixed
    {
        $reflectionAttributeList = $reflectionProperty->getAttributes();

        $class = $reflectionAttributeList[0]->getName();

        return (new $class($actionSchema, $schema))->get();
    }
}
