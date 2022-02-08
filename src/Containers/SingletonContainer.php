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
}
