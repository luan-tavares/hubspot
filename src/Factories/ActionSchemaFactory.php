<?php

namespace LTL\Hubspot\Factories;

use LTL\Hubspot\Containers\SingletonContainer;
use LTL\Hubspot\Core\Schema\ActionProperties\ActionProperty;
use LTL\Hubspot\Core\Schema\ActionSchema;
use LTL\Hubspot\Core\Schema\ResourceSchema;
use ReflectionClass;
use ReflectionProperty;

abstract class ActionSchemaFactory
{
    public static function build(ResourceSchema $resourceSchema, string $action): ActionSchema
    {
        $actionObject = $resourceSchema->getAction($action);

        $reflectionClass = SingletonContainer::get(ActionSchema::class, function ($class) {
            return new ReflectionClass($class);
        });

        $object = $reflectionClass->newInstanceWithoutConstructor();

        $reflectionPropertyList = $reflectionClass->getProperties(ReflectionProperty::IS_PUBLIC|ReflectionProperty::IS_READONLY);

        foreach ($reflectionPropertyList as $reflectionProperty) {
            $reflectionProperty->setValue($object, self::castProperty($actionObject, $reflectionProperty)->get());
        }

        return $object;
    }

    private static function castProperty(object $actionObject, ReflectionProperty $reflectionProperty): ActionProperty
    {
        $cast = current($reflectionProperty->getAttributes())->getName();

        return (new $cast($actionObject));
    }
}
