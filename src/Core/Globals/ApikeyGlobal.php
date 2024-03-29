<?php

namespace LTL\Hubspot\Core\Globals;

abstract class ApikeyGlobal
{
    private static string|null $apikey = null;

    public static function get(): string|null
    {
        return self::$apikey;
    }

    public static function store(string $apikey): void
    {
        self::$apikey = $apikey;
    }

    public static function clear(): void
    {
        self::$apikey = null;
    }

    public static function uriMask(string $uri): string
    {
        preg_match('/hapikey=\w{8}-\w{4}-\w{4}-\w{4}-\w{12}/', $uri, $uuid);

        return str_replace($uuid, 'hapikey=xxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx', $uri);
    }
}
