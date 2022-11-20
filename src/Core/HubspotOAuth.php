<?php

namespace LTL\Hubspot\Core;

abstract class HubspotOAuth
{
    private static string|null $token = null;

    public static function get(): string|null
    {
        return self::$token;
    }

    public static function store(string $token): void
    {
        self::$token = $token;
    }

    public static function clear(): void
    {
        self::$token = null;
    }
}