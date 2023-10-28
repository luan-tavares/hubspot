<?php

namespace LTL\Hubspot\Core\Globals;

abstract class OAuthGlobal
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
