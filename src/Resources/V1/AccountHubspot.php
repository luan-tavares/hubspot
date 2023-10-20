<?php

namespace LTL\Hubspot\Resources\V1;

use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;

/**
 * @method static $this getRateLimit() 
 * See https://developers.hubspot.com/docs/api/usage-details
 *
 * @method $this getRateLimit() 
 * See https://developers.hubspot.com/docs/api/usage-details
 *
 * @method static $this getDetails() 
 * See https://legacydocs.hubspot.com/docs/methods/get-account-details
 *
 * @method $this getDetails() 
 * See https://legacydocs.hubspot.com/docs/methods/get-account-details
 *
 */
class AccountHubspot extends Hubspot
{
    protected string $resource = "account-v1";

    protected int $version = 1;
}