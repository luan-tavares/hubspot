<?php

namespace LTL\Hubspot\Containers;

use LTL\Hubspot\Containers\Interfaces\ContainerByResourceInterface;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Schemas\Interfaces\ActionSchemaInterface;
use LTL\Hubspot\Core\Schemas\Interfaces\ResourceSchemaInterface;
use LTL\Hubspot\Core\Schemas\ResourceSchema;

abstract class SchemaContainer implements ContainerByResourceInterface
{
    private static array $objects = [];

    public static function get(ResourceInterface $resource): ResourceSchemaInterface
    {
        $hash = get_class($resource);

        if (!array_key_exists($hash, self::$objects)) {
            self::$objects[$hash] = new ResourceSchema($resource);
        }
        

        return self::$objects[$hash];
    }

    public static function getAction(ResourceInterface $resource, string $action): ActionSchemaInterface
    {
        return self::get($resource)->getActionDefinition($action);
    }
}
