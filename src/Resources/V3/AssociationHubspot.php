<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @link https://developers.hubspot.com/docs/api/crm/associations
 *
 * @method static self<object> batchGet(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Get the IDs of all {toObjectType} objects associated with those specified in the request body.
 * See https://developers.hubspot.com/docs/api/crm/associations
 *
 * @method self<object> batchGet(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Get the IDs of all {toObjectType} objects associated with those specified in the request body.
 * See https://developers.hubspot.com/docs/api/crm/associations
 *
 * @method static self<null> batchCreate(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Associate all pairs of objects identified in the request body.
 * See https://developers.hubspot.com/docs/api/crm/associations
 *
 * @method self<null> batchCreate(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Associate all pairs of objects identified in the request body.
 * See https://developers.hubspot.com/docs/api/crm/associations
 *
 * @method static self<null> batchDelete(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Remove the associations between all pairs of objects identified in the request body.
 * See https://developers.hubspot.com/docs/api/crm/associations
 *
 * @method self<null> batchDelete(int|string $fromObjectType, int|string $toObjectType, array $requestBody) Remove the associations between all pairs of objects identified in the request body.
 * See https://developers.hubspot.com/docs/api/crm/associations
 *
 */
class AssociationHubspot extends Hubspot
{
    protected string $resource = "associations-v3";

    protected int $version = 3;
}