<?php

namespace LTL\Hubspot\Resources\V1;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @method static self<null> getAll() Get call engagement dispositions.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/get-call-dispositions
 *
 * @method self<null> getAll() Get call engagement dispositions.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/get-call-dispositions
 *
 */
class DispositionHubspot extends Hubspot
{
    protected string $resource = "engagements-dispositions-v1";

    protected int $version = 1;
}