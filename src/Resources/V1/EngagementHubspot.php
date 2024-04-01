<?php

namespace LTL\Hubspot\Resources\V1;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @method static self<object> getRecents() Get recent engagements.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/get-recent-engagements
 *
 * @method self<object> getRecents() Get recent engagements.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/get-recent-engagements
 *
 * @method static self<null> create(array $requestBody) Create an engagement.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/create_engagement
 *
 * @method self<null> create(array $requestBody) Create an engagement.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/create_engagement
 *
 * @method static self<null> update(int|string $engagementId, array $requestBody) Update an Engagement.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/update_engagement-patch
 *
 * @method self<null> update(int|string $engagementId, array $requestBody) Update an Engagement.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/update_engagement-patch
 *
 * @method static self<null> get(int|string $engagementId) Get an engagement.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/get_engagement
 *
 * @method self<null> get(int|string $engagementId) Get an engagement.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/get_engagement
 *
 * @method static self<object> getAll() Get all engagements.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/get-all-engagements
 *
 * @method self<object> getAll() Get all engagements.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/get-all-engagements
 *
 * @method static self<null> delete(int|string $engagementId) DELETE an Engagement.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/delete-engagement
 *
 * @method self<null> delete(int|string $engagementId) DELETE an Engagement.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/delete-engagement
 *
 * @method static self<null> getCallDispositions() Get call engagement dispositions.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/get-call-dispositions
 *
 * @method self<null> getCallDispositions() Get call engagement dispositions.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/get-call-dispositions
 *
 */
class EngagementHubspot extends Hubspot
{
    protected string $resource = "engagements-v1";

    protected int $version = 1;
}