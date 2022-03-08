<?php

namespace LTL\Hubspot\Containers;

use LTL\Hubspot\Core\Interfaces\Response\ResponseInterface;
use LTL\Hubspot\Core\Interfaces\Response\ResponseRepositoryInterface;
use LTL\Hubspot\Factories\ResponseRepositoryFactory;

abstract class ResponseRepositoryContainer
{
    private static array $objects = [];

    public static function get(ResponseInterface $response): ResponseRepositoryInterface
    {
        $hash = spl_object_hash($response);

        if (!array_key_exists($hash, self::$objects)) {
            self::$objects[$hash] = ResponseRepositoryFactory::build($response);
        }

        return self::$objects[$hash];
    }

    public static function destroy(ResponseInterface $response): void
    {
        $hash = spl_object_hash($response);

        unset(self::$objects[$hash]);
    }

    public static function count(): int
    {
        return count(self::$objects);
    }
}
