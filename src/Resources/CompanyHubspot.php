<?php

namespace LTL\HubspotApi\Resources;

use LTL\HubspotApi\Hubspot;

/**
* @method static $this list() Read a page of companies
* @method $this list() Read a page of companies
* @method static $this get(int|string $companyId) Read an company identified by {companyId}
* @method $this get(int|string $companyId) Read an company identified by {companyId}
* @method static $this create(array $requestBody) Create a company with the given properties
* @method $this create(array $requestBody) Create a company with the given properties
* @method static $this archive(int|string $companyId) Move an company identified by {companyId} to the recycling bin
* @method $this archive(int|string $companyId) Move an company identified by {companyId} to the recycling bin
* @method static $this update(int|string $companyId, array $requestBody) Perform a partial update of an company identified by {companyId}
* @method $this update(int|string $companyId, array $requestBody) Perform a partial update of an company identified by {companyId}
* @method static $this listAssociationsByType(int|string $companyId, int|string $toObjectType) List associations of a company by type
* @method $this listAssociationsByType(int|string $companyId, int|string $toObjectType) List associations of a company by type
* @method static $this createAssociation(int|string $companyId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a company with another object
* @method $this createAssociation(int|string $companyId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a company with another object
* @method static $this removeAssociation(int|string $companyId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association with companies
* @method $this removeAssociation(int|string $companyId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association with companies
* @method static $this batchArchive() Archive a batch of companies by ID
* @method $this batchArchive() Archive a batch of companies by ID
* @method static $this batchCreate(array $requestBody) Create a batch of companies
* @method $this batchCreate(array $requestBody) Create a batch of companies
* @method static $this batchRead(array $requestBody) Read a batch of companies by internal ID, or unique property values
* @method $this batchRead(array $requestBody) Read a batch of companies by internal ID, or unique property values
* @method static $this batchUpdate(array $requestBody) Update a batch of companies
* @method $this batchUpdate(array $requestBody) Update a batch of companies
* @method static $this search(array $requestBody) Serach Companies
* @method $this search(array $requestBody) Serach Companies
 */
class CompanyHubspot extends Hubspot
{
    protected string $resource = "companies";
}
