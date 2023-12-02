<?php

namespace LTL\Hubspot\Resources\V1;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;

/**
 * @method static $this getAll() Get call engagement dispositions.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/get-call-dispositions
 *
 * @method $this getAll() Get call engagement dispositions.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/get-call-dispositions
 *
 */
class DispositionHubspot extends Hubspot
{
    protected string $resource = "engagements-dispositions-v1";

    protected int $version = 1;
}