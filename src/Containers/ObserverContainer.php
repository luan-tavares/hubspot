<?php

namespace LTL\Hubspot\Containers;

abstract class ObserverContainer
{
    private static array $objects = [];

    public static function get(string $className): object
    {
        if (!isset(self::$objects[$className])) {
            self::$objects[$className] = new $className;
        }
      
        return self::$objects[$className];
    }
}
