<?php

namespace LTL\Hubspot\Containers;

abstract class ApikeyContainer
{
    private static string|null $apikey = null;

    public static function get(): string|null
    {
        return self::$apikey;
    }

    public static function store(string $apikey)
    {
        self::$apikey = $apikey;
    }
}
