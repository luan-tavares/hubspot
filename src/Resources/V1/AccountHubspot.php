<?php

namespace LTL\Hubspot\Resources\V1;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @method static self<null> getRateLimit() 
 * See https://developers.hubspot.com/docs/api/usage-details
 *
 * @method self<null> getRateLimit() 
 * See https://developers.hubspot.com/docs/api/usage-details
 *
 * @method static self<null> getDetails() 
 * See https://legacydocs.hubspot.com/docs/methods/get-account-details
 *
 * @method self<null> getDetails() 
 * See https://legacydocs.hubspot.com/docs/methods/get-account-details
 *
 */
class AccountHubspot extends Hubspot
{
    protected string $resource = "account-v1";

    protected int $version = 1;
}