<?php

namespace LTL\Hubspot\Resources\V1;

use LTL\Hubspot\Hubspot;

/**
 * @method static $this getRecents() Get recent engagements.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/get-recent-engagements
 *
 * @method $this getRecents() Get recent engagements.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/get-recent-engagements
 *
 * @method static $this create(array $requestBody) Create an engagement.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/create_engagement
 *
 * @method $this create(array $requestBody) Create an engagement.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/create_engagement
 *
 * @method static $this update(int|string $engagementId, array $requestBody) Update an Engagement.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/update_engagement-patch
 *
 * @method $this update(int|string $engagementId, array $requestBody) Update an Engagement.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/update_engagement-patch
 *
 * @method static $this get(int|string $engagementId) Get an engagement.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/get_engagement
 *
 * @method $this get(int|string $engagementId) Get an engagement.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/get_engagement
 *
 * @method static $this getAll() Get all engagements.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/get-all-engagements
 *
 * @method $this getAll() Get all engagements.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/get-all-engagements
 *
 * @method static $this delete(int|string $engagementId) DELETE an Engagement.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/delete-engagement
 *
 * @method $this delete(int|string $engagementId) DELETE an Engagement.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/delete-engagement
 *
 * @method static $this getCallDispositions() Get call engagement dispositions.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/get-call-dispositions
 *
 * @method $this getCallDispositions() Get call engagement dispositions.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/get-call-dispositions
 *
 */
class EngagementHubspot extends Hubspot
{
    protected string $resource = "engagements-v1";

    protected int $version = 1;
}
