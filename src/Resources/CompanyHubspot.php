<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
* @method static $this getAll() Read a page of companies. Control what is returned via the properties query param.
* @method $this getAll() Read a page of companies. Control what is returned via the properties query param.
* @method static $this get(int|string $companyId) Read an company identified by {companyId}.
* @method $this get(int|string $companyId) Read an company identified by {companyId}.
* @method static $this create(array $requestBody) Create a company with the given properties and return a copy of the object, including the ID.
* @method $this create(array $requestBody) Create a company with the given properties and return a copy of the object, including the ID.
* @method static $this update(int|string $companyId, array $requestBody) Perform a partial update of an company identified by {companyId}.
* @method $this update(int|string $companyId, array $requestBody) Perform a partial update of an company identified by {companyId}.
* @method static $this delete(int|string $companyId) Move an company identified by {companyId} to the recycling bin.
* @method $this delete(int|string $companyId) Move an company identified by {companyId} to the recycling bin.
* @method static $this getAssociations(int|string $companyId, int|string $toObjectType) List associations of a company by type.
* @method $this getAssociations(int|string $companyId, int|string $toObjectType) List associations of a company by type.
* @method static $this createAssociation(int|string $companyId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a company with another object.
* @method $this createAssociation(int|string $companyId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a company with another object.
* @method static $this removeAssociation(int|string $companyId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between a company and an object.
* @method $this removeAssociation(int|string $companyId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between a company and an object.
* @method static $this batchDelete(array $requestBody) Archive a batch of companies by ID.
* @method $this batchDelete(array $requestBody) Archive a batch of companies by ID.
* @method static $this batchCreate(array $requestBody) Create a batch of companies.
* @method $this batchCreate(array $requestBody) Create a batch of companies.
* @method static $this batchRead(array $requestBody) Read a batch of companies by internal ID, or unique property values.
* @method $this batchRead(array $requestBody) Read a batch of companies by internal ID, or unique property values.
* @method static $this batchUpdate(array $requestBody) Update a batch of companies.
* @method $this batchUpdate(array $requestBody) Update a batch of companies.
* @method static $this search(array $requestBody) Search companies.
* @method $this search(array $requestBody) Search companies.
 */
class CompanyHubspot extends Hubspot
{
    protected string $resource = "companies-v3";
}
