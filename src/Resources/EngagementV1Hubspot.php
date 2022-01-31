<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
* @method static $this getRecents() Get recent engagements
* @method $this getRecents() Get recent engagements
* @method static $this create(array $requestBody) Create an engagement
* @method $this create(array $requestBody) Create an engagement
* @method static $this update(int|string $engagementId, array $requestBody) Update an Engagement
* @method $this update(int|string $engagementId, array $requestBody) Update an Engagement
* @method static $this get(int|string $engagementId) Get an engagement
* @method $this get(int|string $engagementId) Get an engagement
* @method static $this getAll() Get all engagements
* @method $this getAll() Get all engagements
* @method static $this delete(int|string $engagementId) DELETE an Engagement
* @method $this delete(int|string $engagementId) DELETE an Engagement
* @method static $this getCallDispositions() Get call engagement dispositions
* @method $this getCallDispositions() Get call engagement dispositions
 */
class EngagementV1Hubspot extends Hubspot
{
    protected string $resource = "engagements-v1";
}
