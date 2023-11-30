<?php

namespace LTL\Hubspot\Factories;

use LTL\Hubspot\Containers\SingletonContainer;
use LTL\Hubspot\Core\Schema\ActionProperties\ActionProperty;
use LTL\Hubspot\Core\Schema\ActionSchema;
use LTL\Hubspot\Core\Schema\Interfaces\ActionSchemaInterface;
use LTL\Hubspot\Core\Schema\Interfaces\ResourceSchemaInterface;
use ReflectionClass;
use ReflectionProperty;

abstract class ActionSchemaFactory
{
    public static function build(ResourceSchemaInterface $resourceSchema, string $action): ActionSchemaInterface
    {
        $actionObject = $resourceSchema->getAction($action);

        $reflectionClass = SingletonContainer::get(ActionSchema::class, function ($class) {
            return new ReflectionClass($class);
        });

        $object = $reflectionClass->newInstanceWithoutConstructor();

        $reflectionPropertyList = $reflectionClass->getProperties(ReflectionProperty::IS_PRIVATE);

        foreach ($reflectionPropertyList as $reflectionProperty) {
            $reflectionProperty->setValue($object, self::castProperty($actionObject, $reflectionProperty)->get());
        }

        return $object;
    }

    private static function castProperty(object $actionObject, ReflectionProperty $reflectionProperty): ActionProperty
    {
        $cast = $reflectionProperty->getAttributes()[0]->getName();

        return (new $cast($actionObject));
    }
}
