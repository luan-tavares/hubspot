<?php

namespace LTL\Hubspot\Containers;

abstract class SingletonContainer
{
    private static array $objects = [];

    public static function get(string $class, callable|null $callback = null): object
    {
        if (isset(self::$objects[$class])) {
            return self::$objects[$class];
        }

        if (is_callable($callback)) {
            self::$objects[$class] = $callback($class);

            return self::$objects[$class];
        }

        return self::$objects[$class] = new $class;
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
