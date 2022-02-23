<?php

namespace LTL\Hubspot\Containers;

use LTL\Hubspot\Interfaces\ContainerByResourceInterface;
use LTL\Hubspot\Core\Interfaces\Request\RequestInterface;
use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;
use LTL\Hubspot\Factories\RequestFactory;

abstract class RequestContainer implements ContainerByResourceInterface
{
    private static array $objects = [];

    public static function get(ResourceInterface $resource): RequestInterface
    {
        $hash = spl_object_hash($resource);

        if (!array_key_exists($hash, self::$objects)) {
            self::$objects[$hash] = RequestFactory::build($resource);
        }

        
        return self::$objects[$hash];
    }

    public static function destroy(ResourceInterface $resource): void
    {
        $hash = spl_object_hash($resource);

        unset(self::$objects[$hash]);
    }
}
