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
 * @method static self<object, null> get(int|string $objectId, int|string $definitionId) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-associations/get-associations
 *
 * @method self<object, null> get(int|string $objectId, int|string $definitionId) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-associations/get-associations
 *
 * @method static self<object, null> create(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-associations/associate-objects
 *
 * @method self<object, null> create(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-associations/associate-objects
 *
 * @method static self<object, null> delete() 
 * See https://legacydocs.hubspot.com/docs/methods/crm-associations/delete-association
 *
 * @method self<object, null> delete() 
 * See https://legacydocs.hubspot.com/docs/methods/crm-associations/delete-association
 *
 * @method static self<object, null> batchCreate(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-associations/batch-associate-objects
 *
 * @method self<object, null> batchCreate(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-associations/batch-associate-objects
 *
 * @method static self<object, null> batchDelete(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-associations/batch-delete-associations
 *
 * @method self<object, null> batchDelete(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-associations/batch-delete-associations
 *
 */
class AssociationHubspot extends Hubspot
{
    protected string $resource = "associations-v1";

    protected int $version = 1;
}