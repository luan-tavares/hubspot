<?php

namespace LTL\Hubspot\Containers;

use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;
use LTL\Hubspot\Core\Response\ResponseObject;

abstract class ResponseObjectContainer
{
    private static array $objects = [];

    public static function get(ResponseInterface $response): mixed
    {
        $hash = spl_object_hash($response);

        if (!array_key_exists($hash, self::$objects)) {
            self::$objects[$hash] = new ResponseObject($response);
        }

        return self::$objects[$hash];
    }

    public static function destroy(ResponseInterface $response): void
    {
        $hash = spl_object_hash($response);

        unset(self::$objects[$hash]);
    }
}
