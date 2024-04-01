<?php

namespace LTL\Hubspot\Resources\V1;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TResponse
 * @template TIterator
 * @extends Hubspot<TResponse, TIterator>
 *
 * @method static self<object, null> getRateLimit() 
 * See https://developers.hubspot.com/docs/api/usage-details
 *
 * @method self<object, null> getRateLimit() 
 * See https://developers.hubspot.com/docs/api/usage-details
 *
 * @method static self<object, null> getDetails() 
 * See https://legacydocs.hubspot.com/docs/methods/get-account-details
 *
 * @method self<object, null> getDetails() 
 * See https://legacydocs.hubspot.com/docs/methods/get-account-details
 *
 */
class AccountHubspot extends Hubspot
{
    protected string $resource = "account-v1";

    protected int $version = 1;
}