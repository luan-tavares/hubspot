<?php

namespace LTL\Hubspot\Containers;

use LTL\Hubspot\Interfaces\ContainerByResourceInterface;
use LTL\Hubspot\Core\Builder;
use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;
use LTL\Hubspot\Factories\BuilderFactory;

abstract class BuilderContainer implements ContainerByResourceInterface
{
    private const MAX_OBJECTS = 5;

    private static array $objects = [];

    public static function get(ResourceInterface $resource): Builder
    {
        $hash = spl_object_hash($resource);

        if (!array_key_exists($hash, self::$objects)) {
            self::removeLastIf((count(self::$objects) >= self::MAX_OBJECTS));
            self::$objects[$hash] = BuilderFactory::build($resource);
        }

        
        return self::$objects[$hash];
    }

    private static function removeLastIf(bool $condition)
    {
        if ($condition) {
            $keys = array_keys(self::$objects);
            unset(self::$objects[end($keys)]);
        }
    }
}
