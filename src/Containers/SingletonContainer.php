<?php

namespace LTL\Hubspot\Containers;

abstract class SingletonContainer
{
    private static array $objects = [];

    public static function get(string $alias, callable $function): object
    {
        if (!isset(self::$objects[$alias])) {
            self::$objects[$alias] = $function($alias);
        }

        return self::$objects[$alias];
    }
}
