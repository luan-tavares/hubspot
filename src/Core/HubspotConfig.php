<?php

namespace LTL\Hubspot\Core;

abstract class HubspotConfig
{
    public const BASE_PATH = __DIR__ .'/../..';

    public const SCHEMA_PATH = __DIR__ .'/../../src/schemas';

    public const BASE_URL = 'https://api.hubapi.com';

    public const DEFAULT_CONTENT_TYPE = 'application/json';

    public const METHODS = ['PUT', 'POST', 'PATCH', 'GET', 'DELETE'];
    
    public const METHODS_WITH_BODY = ['PUT', 'POST', 'PATCH'];

    public const TOO_MANY_REQUESTS_ERROR_CODE = 429;
    
    public const TOO_MANY_REQUESTS_TRIES = 15;

    public const CONFLICT_ERROR_CODE = 409;

    public const NOT_FOUND_ERROR_CODE = 404;

    public const MULTI_STATUS_CODE = 207;

    public const SLEEP_SECONDS = 2;
}
