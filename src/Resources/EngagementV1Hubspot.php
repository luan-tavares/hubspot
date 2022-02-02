<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
 * @method static $this getRecents() Get recent engagements
 * See 
 *
 * @method $this getRecents() Get recent engagements
 * See 
 *
 * @method static $this create(array $requestBody) Create an engagement
 * See 
 *
 * @method $this create(array $requestBody) Create an engagement
 * See 
 *
 * @method static $this update(int|string $engagementId, array $requestBody) Update an Engagement
 * See 
 *
 * @method $this update(int|string $engagementId, array $requestBody) Update an Engagement
 * See 
 *
 * @method static $this get(int|string $engagementId) Get an engagement
 * See 
 *
 * @method $this get(int|string $engagementId) Get an engagement
 * See 
 *
 * @method static $this all() Get all engagements
 * See 
 *
 * @method $this all() Get all engagements
 * See 
 *
 * @method static $this delete(int|string $engagementId) DELETE an Engagement
 * See 
 *
 * @method $this delete(int|string $engagementId) DELETE an Engagement
 * See 
 *
 * @method static $this getCallDispositions() Get call engagement dispositions
 * See 
 *
 * @method $this getCallDispositions() Get call engagement dispositions
 * See 
 *
 */
class EngagementV1Hubspot extends Hubspot
{
    protected string $resource = "engagements-v1";
}
