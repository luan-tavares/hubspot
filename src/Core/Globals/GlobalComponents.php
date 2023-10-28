<?php

namespace LTL\Hubspot\Core\Globals;

use LTL\Hubspot\Core\Interfaces\GlobalComponentInterface;
use LTL\ListMethods\PublicMethods\Interfaces\StaticPublicMethodsListableInterface;
use LTL\ListMethods\PublicMethods\Traits\StaticPublicMethodsListable;

abstract class GlobalComponents implements GlobalComponentInterface, StaticPublicMethodsListableInterface
{
    use StaticPublicMethodsListable;

    public static function setGlobalApikey(string $apikey): void
    {
        ApikeyGlobal::store($apikey);
    }

    public static function setGlobalOAuth(string $token): void
    {
        OAuthGlobal::store($token);
    }

}
