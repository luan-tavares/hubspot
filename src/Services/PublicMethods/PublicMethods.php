<?php

namespace LTL\Hubspot\Services\PublicMethods;

use ReflectionClass;
use ReflectionMethod;

abstract class PublicMethods
{
    public static function list(string $class): array
    {
        $reflectionClass = new ReflectionClass($class);

        return self::listPublicMethods($reflectionClass);
    }

    private static function listPublicMethods(ReflectionClass $reflectionClass): array
    {
        $publicMethods = $reflectionClass->getMethods(ReflectionMethod::IS_PUBLIC);

        $list = [];

        foreach ($publicMethods as $reflectionMethod) {
            if (!self::isCorrectMethod($reflectionMethod, $reflectionClass)) {
                continue;
            }
            
            $list[] = $reflectionMethod->name;
        }

        return $list;
    }

    private static function isCorrectMethod(ReflectionMethod $reflectionMethod, ReflectionClass $reflectionClass): bool
    {
        if ($reflectionMethod->isStatic()) {
            return false;
        }

        if ($reflectionMethod->name === 'getMethods') {
            return false;
        }

        if ($reflectionMethod->class !== $reflectionClass->name) {
            return false;
        }
            
        if (substr($reflectionMethod->name, 0, 2) === '__') {
            return false;
        }

        return true;
    }
}
