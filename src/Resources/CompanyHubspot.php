<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
 * @method static $this all() Read a page of companies. Control what is returned via the properties query param.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this all() Read a page of companies. Control what is returned via the properties query param.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this get(int|string $companyId) Read an company identified by {companyId}.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this get(int|string $companyId) Read an company identified by {companyId}.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this create(array $requestBody) Create a company with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this create(array $requestBody) Create a company with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this update(int|string $companyId, array $requestBody) Perform a partial update of an company identified by {companyId}.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this update(int|string $companyId, array $requestBody) Perform a partial update of an company identified by {companyId}.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this delete(int|string $companyId) Move an company identified by {companyId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this delete(int|string $companyId) Move an company identified by {companyId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this getAssociations(int|string $companyId, int|string $toObjectType) List associations of a company by type.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this getAssociations(int|string $companyId, int|string $toObjectType) List associations of a company by type.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this createAssociation(int|string $companyId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a company with another object.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this createAssociation(int|string $companyId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a company with another object.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this removeAssociation(int|string $companyId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between a company and an object.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this removeAssociation(int|string $companyId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between a company and an object.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this batchDelete(array $requestBody) Archive a batch of companies by ID.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this batchDelete(array $requestBody) Archive a batch of companies by ID.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this batchCreate(array $requestBody) Create a batch of companies.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this batchCreate(array $requestBody) Create a batch of companies.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this batchRead(array $requestBody) Read a batch of companies by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this batchRead(array $requestBody) Read a batch of companies by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this batchUpdate(array $requestBody) Update a batch of companies.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this batchUpdate(array $requestBody) Update a batch of companies.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this search(array $requestBody) Search companies.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this search(array $requestBody) Search companies.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 */
class CompanyHubspot extends Hubspot
{
    protected string $resource = "companies-v3";
}
