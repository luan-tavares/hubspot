<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;

/**
 * @link https://developers.hubspot.com/docs/api/crm/associations
 *
 * @method static $this batchGet(int|string $fromObjectType, int|string $toObjectType, BaseBodyBuilder|array $requestBody) Get the IDs of all {toObjectType} objects associated with those specified in the request body.
 * See https://developers.hubspot.com/docs/api/crm/associations
 *
 * @method $this batchGet(int|string $fromObjectType, int|string $toObjectType, BaseBodyBuilder|array $requestBody) Get the IDs of all {toObjectType} objects associated with those specified in the request body.
 * See https://developers.hubspot.com/docs/api/crm/associations
 *
 * @method static $this batchCreate(int|string $fromObjectType, int|string $toObjectType, BaseBodyBuilder|array $requestBody) Associate all pairs of objects identified in the request body.
 * See https://developers.hubspot.com/docs/api/crm/associations
 *
 * @method $this batchCreate(int|string $fromObjectType, int|string $toObjectType, BaseBodyBuilder|array $requestBody) Associate all pairs of objects identified in the request body.
 * See https://developers.hubspot.com/docs/api/crm/associations
 *
 * @method static $this batchDelete(int|string $fromObjectType, int|string $toObjectType, BaseBodyBuilder|array $requestBody) Remove the associations between all pairs of objects identified in the request body.
 * See https://developers.hubspot.com/docs/api/crm/associations
 *
 * @method $this batchDelete(int|string $fromObjectType, int|string $toObjectType, BaseBodyBuilder|array $requestBody) Remove the associations between all pairs of objects identified in the request body.
 * See https://developers.hubspot.com/docs/api/crm/associations
 *
 */
class AssociationHubspot extends Hubspot
{
    protected string $resource = "associations-v3";

    protected int $version = 3;
}
