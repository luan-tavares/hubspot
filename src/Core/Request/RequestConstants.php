<?php

namespace LTL\Hubspot\Core\Request;

class RequestConstants
{
    public const BASE_URL = 'https://api.hubapi.com';

    public const DEFAULT_CONTENT_TYPE = 'application/json';

    public const METHODS_WITH_BODY = ['PUT', 'POST', 'PATCH'];
}
