<?php
namespace LTL\Hubspot\Core\Response;

use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;

abstract class ResponseObjectStorage
{
    private static array $responses = [];


    public static function get(ResponseInterface $response): mixed
    {
        $hash = spl_object_hash($response);

        if (!array_key_exists($hash, self::$responses)) {
            $object = json_decode($response->get());
            self::$responses[$hash] = $object;
        }

        return self::$responses[$hash];
    }

    public static function unset(ResponseInterface $response): void
    {
        $hash = spl_object_hash($response);

        unset(self::$responses[$hash]);
    }
}
