<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Resources\V3\Interfaces\{CrmHubspotInterface};

/**
 * @link https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this getAll() Read a page of companies. Control what is returned via the properties query param.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this getAll() Read a page of companies. Control what is returned via the properties query param.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this get(int|string $companyId) Read an company identified by {companyId}.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this get(int|string $companyId) Read an company identified by {companyId}.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this create(array|Body\HubspotCrmCreateBody $requestBody) Create a company with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this create(array|Body\HubspotCrmCreateBody $requestBody) Create a company with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this update(int|string $companyId, array|Body\HubspotCrmUpdateBody $requestBody) Perform a partial update of an company identified by {companyId}.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this update(int|string $companyId, array|Body\HubspotCrmUpdateBody $requestBody) Perform a partial update of an company identified by {companyId}.
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
 * @method static $this batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch of companies by ID.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch of companies by ID.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch of companies.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch of companies.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch of companies by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch of companies by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch of companies.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch of companies.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this search(array|Body\HubspotSearchBody $requestBody) Search companies.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this search(array|Body\HubspotSearchBody $requestBody) Search companies.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this merge(array $requestBody) Merge two companies with same type.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this merge(array $requestBody) Merge two companies with same type.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update company if id is not null.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update company if id is not null.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this importAll(callable $fn) (Handler) Import All Companies using offset and getAll
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this importAll(callable $fn) (Handler) Import All Companies using offset and getAll
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 */
class CompanyHubspot extends Hubspot implements CrmHubspotInterface
{
    protected string $resource = "companies-v3";

    protected int $version = 3;
}