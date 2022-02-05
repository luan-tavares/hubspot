<?php

namespace LTL\Hubspot\Containers;

abstract class SingletonContainer
{
    private static array $objects = [];

    public static function get(string $alias, callable $callback): object
    {
        if (!isset(self::$objects[$alias])) {
            self::$objects[$alias] = $callback($alias);
        }

        return self::$objects[$alias];
    }
}
