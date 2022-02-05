<?php
namespace LTL\Hubspot\Core\Response;

use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;

abstract class ResponseObjectContainer
{
    private static array $objects = [];

    public static function get(ResponseInterface $response): mixed
    {
        $hash = spl_object_hash($response);

        if (!array_key_exists($hash, self::$objects)) {
            self::$objects[$hash] = new ResponseObjectStorage($response);
        }

       

        return self::$objects[$hash];
    }

    public static function destroy(ResponseInterface $response): void
    {
        $hash = spl_object_hash($response);

        unset(self::$objects[$hash]);
    }
}
