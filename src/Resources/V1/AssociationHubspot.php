<?php

namespace LTL\Hubspot\Resources\V1;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @method static self<null> get(int|string $objectId, int|string $definitionId) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-associations/get-associations
 *
 * @method self<null> get(int|string $objectId, int|string $definitionId) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-associations/get-associations
 *
 * @method static self<null> create(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-associations/associate-objects
 *
 * @method self<null> create(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-associations/associate-objects
 *
 * @method static self<null> delete() 
 * See https://legacydocs.hubspot.com/docs/methods/crm-associations/delete-association
 *
 * @method self<null> delete() 
 * See https://legacydocs.hubspot.com/docs/methods/crm-associations/delete-association
 *
 * @method static self<null> batchCreate(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-associations/batch-associate-objects
 *
 * @method self<null> batchCreate(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-associations/batch-associate-objects
 *
 * @method static self<null> batchDelete(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-associations/batch-delete-associations
 *
 * @method self<null> batchDelete(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-associations/batch-delete-associations
 *
 */
class AssociationHubspot extends Hubspot
{
    protected string $resource = "associations-v1";

    protected int $version = 1;
}