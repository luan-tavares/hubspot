<?php
namespace LTL\Hubspot\Core\Response;

use LTL\Hubspot\Core\Exceptions\HubspotApiException;
use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;

abstract class ResponseArrayStorage
{
    private static array $responses = [];

    public static function get(ResponseInterface $response): array
    {
        $hash = spl_object_hash($response);

        if (!array_key_exists($hash, self::$responses)) {
            self::$responses[$hash] = json_decode($response->get(), true);
        }

        if (is_null(self::$responses[$hash])) {
            throw new HubspotApiException("Youn can't transform the response in array!\n". $response->get());
        }

        return self::$responses[$hash];
    }

    public static function unset(ResponseInterface $response): void
    {
        $hash = spl_object_hash($response);

        unset(self::$responses[$hash]);
    }
}
