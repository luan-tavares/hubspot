<?php

namespace LTL\Hubspot\Core;

abstract class HubspotConfig
{
    public const BASE_PATH = __DIR__ .'/../..';

    public const BASE_URL = 'https://api.hubapi.com';

    public const DEFAULT_CONTENT_TYPE = 'application/json';

    public const METHODS = ['PUT', 'POST', 'PATCH', 'GET', 'DELETE'];
    
    public const METHODS_WITH_BODY = ['PUT', 'POST', 'PATCH'];
}
