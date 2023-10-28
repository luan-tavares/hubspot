<?php

namespace LTL\Hubspot\Core\Interfaces;

interface GlobalComponentInterface
{
    public static function setGlobalApikey(string $apikey): void;
    public static function setGlobalOAuth(string $token): void;
}
