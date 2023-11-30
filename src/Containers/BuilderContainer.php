<?php

namespace LTL\Hubspot\Containers;

use LTL\Hubspot\Core\BuilderInterface;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Factories\BuilderFactory;
use LTL\Hubspot\Factories\RequestFactory;
use LTL\Hubspot\Interfaces\ContainerByResourceInterface;

abstract class BuilderContainer implements ContainerByResourceInterface
{
    private const MAX_OBJECTS = 5;

    private static array $objects = [];

    public static function get(ResourceInterface $baseResource): BuilderInterface
    {
        $hash = spl_object_hash($baseResource);

        if (!array_key_exists($hash, self::$objects)) {
            self::removeLastIf((count(self::$objects) >= self::MAX_OBJECTS));
            $request = RequestFactory::build($baseResource);
            self::$objects[$hash] = BuilderFactory::build($baseResource, $request);
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

    public static function count(): int
    {
        return count(self::$objects);
    }

    public static function destroy(ResourceInterface $baseResource): void
    {
        $hash = spl_object_hash($baseResource);

        unset(self::$objects[$hash]);
    }

    public static function destroyAll(): void
    {
        foreach (self::$objects as $hash => $object) {
            unset(self::$objects[$hash]);
        }
    }
}
