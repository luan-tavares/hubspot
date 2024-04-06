<?php

namespace LTL\Hubspot\Containers;

use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Schema\ActionSchema;
use LTL\Hubspot\Core\Schema\ResourceSchema;
use LTL\Hubspot\Interfaces\ContainerByResourceInterface;

abstract class SchemaContainer implements ContainerByResourceInterface
{
    private static array $objects = [];

    public static function get(ResourceInterface $resource): ResourceSchema
    {
        $hash = get_class($resource);

        if (!array_key_exists($hash, self::$objects)) {
            self::$objects[$hash] = new ResourceSchema($resource);
        }
        

        return self::$objects[$hash];
    }

    public static function getAction(ResourceInterface $resource, string $action): ActionSchema
    {
        return self::get($resource)->getActionDefinition($action);
    }

    public static function count(): int
    {
        return count(self::$objects);
    }

    public static function destroyAll(): void
    {
        foreach (self::$objects as $hash => $object) {
            unset(self::$objects[$hash]);
        }
    }
}
