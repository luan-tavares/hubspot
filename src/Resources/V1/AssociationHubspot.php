<?php

namespace LTL\Hubspot\Resources\V1;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;

/**
 * @method static $this get(int|string $objectId, int|string $definitionId) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-associations/get-associations
 *
 * @method $this get(int|string $objectId, int|string $definitionId) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-associations/get-associations
 *
 * @method static $this create(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-associations/associate-objects
 *
 * @method $this create(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-associations/associate-objects
 *
 * @method static $this delete() 
 * See https://legacydocs.hubspot.com/docs/methods/crm-associations/delete-association
 *
 * @method $this delete() 
 * See https://legacydocs.hubspot.com/docs/methods/crm-associations/delete-association
 *
 * @method static $this batchCreate(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-associations/batch-associate-objects
 *
 * @method $this batchCreate(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-associations/batch-associate-objects
 *
 * @method static $this batchDelete(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-associations/batch-delete-associations
 *
 * @method $this batchDelete(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/crm-associations/batch-delete-associations
 *
 */
class AssociationHubspot extends Hubspot
{
    protected string $resource = "associations-v1";

    protected int $version = 1;
}