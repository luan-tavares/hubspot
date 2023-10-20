<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;

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
 * @method static $this create(BaseBodyBuilder|array $requestBody) Create a company with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this create(BaseBodyBuilder|array $requestBody) Create a company with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this update(int|string $companyId, BaseBodyBuilder|array $requestBody) Perform a partial update of an company identified by {companyId}.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this update(int|string $companyId, BaseBodyBuilder|array $requestBody) Perform a partial update of an company identified by {companyId}.
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
 * @method static $this createAssociation(int|string $companyId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, BaseBodyBuilder|array $requestBody) Associate a company with another object.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this createAssociation(int|string $companyId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, BaseBodyBuilder|array $requestBody) Associate a company with another object.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this removeAssociation(int|string $companyId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between a company and an object.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this removeAssociation(int|string $companyId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between a company and an object.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this batchDelete(BaseBodyBuilder|array $requestBody) Archive a batch of companies by ID.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this batchDelete(BaseBodyBuilder|array $requestBody) Archive a batch of companies by ID.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this batchCreate(BaseBodyBuilder|array $requestBody) Create a batch of companies.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this batchCreate(BaseBodyBuilder|array $requestBody) Create a batch of companies.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this batchRead(BaseBodyBuilder|array $requestBody) Read a batch of companies by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this batchRead(BaseBodyBuilder|array $requestBody) Read a batch of companies by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this batchUpdate(BaseBodyBuilder|array $requestBody) Update a batch of companies.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this batchUpdate(BaseBodyBuilder|array $requestBody) Update a batch of companies.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this search(BaseBodyBuilder|array $requestBody) Search companies.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this search(BaseBodyBuilder|array $requestBody) Search companies.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this merge(BaseBodyBuilder|array $requestBody) Merge two companies with same type.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this merge(BaseBodyBuilder|array $requestBody) Merge two companies with same type.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this createOrUpdate(LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update company if id is not null.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this createOrUpdate(LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update company if id is not null.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static $this importAll(callable $fn) (Handler) Import All Companies using offset and getAll
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method $this importAll(callable $fn) (Handler) Import All Companies using offset and getAll
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 */
class CompanyHubspot extends Hubspot
{
    protected string $resource = "companies-v3";

    protected int $version = 3;
}