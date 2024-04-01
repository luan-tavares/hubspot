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
 * @method static self<array<int, object>, object> getRecents() Get recent engagements.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/get-recent-engagements
 *
 * @method self<array<int, object>, object> getRecents() Get recent engagements.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/get-recent-engagements
 *
 * @method static self<object, null> create(array $requestBody) Create an engagement.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/create_engagement
 *
 * @method self<object, null> create(array $requestBody) Create an engagement.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/create_engagement
 *
 * @method static self<object, null> update(int|string $engagementId, array $requestBody) Update an Engagement.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/update_engagement-patch
 *
 * @method self<object, null> update(int|string $engagementId, array $requestBody) Update an Engagement.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/update_engagement-patch
 *
 * @method static self<object, null> get(int|string $engagementId) Get an engagement.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/get_engagement
 *
 * @method self<object, null> get(int|string $engagementId) Get an engagement.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/get_engagement
 *
 * @method static self<array<int, object>, object> getAll() Get all engagements.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/get-all-engagements
 *
 * @method self<array<int, object>, object> getAll() Get all engagements.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/get-all-engagements
 *
 * @method static self<object, null> delete(int|string $engagementId) DELETE an Engagement.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/delete-engagement
 *
 * @method self<object, null> delete(int|string $engagementId) DELETE an Engagement.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/delete-engagement
 *
 * @method static self<object, null> getCallDispositions() Get call engagement dispositions.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/get-call-dispositions
 *
 * @method self<object, null> getCallDispositions() Get call engagement dispositions.
 * See https://legacydocs.hubspot.com/docs/methods/engagements/get-call-dispositions
 *
 */
class EngagementHubspot extends Hubspot
{
    protected string $resource = "engagements-v1";

    protected int $version = 1;
}