<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;
use LTL\Hubspot\Resources\V3\Interfaces\{CrmHubspotInterface};

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @link https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static self<Objects\CrmObject|object> getAll() Read a page of companies. Control what is returned via the properties query param.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method self<Objects\CrmObject|object> getAll() Read a page of companies. Control what is returned via the properties query param.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static self<null>&Objects\CrmObject get(int|string $companyId) Read an company identified by {companyId}.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method self<null>&Objects\CrmObject get(int|string $companyId) Read an company identified by {companyId}.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static self<null>&Objects\CrmObject create(array|Body\HubspotCrmCreateBody $requestBody) Create a company with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method self<null>&Objects\CrmObject create(array|Body\HubspotCrmCreateBody $requestBody) Create a company with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static self<null>&Objects\CrmObject update(int|string $companyId, array|Body\HubspotCrmUpdateBody $requestBody) Perform a partial update of an company identified by {companyId}.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method self<null>&Objects\CrmObject update(int|string $companyId, array|Body\HubspotCrmUpdateBody $requestBody) Perform a partial update of an company identified by {companyId}.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static self<null> delete(int|string $companyId) Move an company identified by {companyId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method self<null> delete(int|string $companyId) Move an company identified by {companyId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static self<null> gdprDelete(array $requestBody) Permanently delete a contact and all associated content to follow GDPR.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method self<null> gdprDelete(array $requestBody) Permanently delete a contact and all associated content to follow GDPR.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static self<null> batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch of companies by ID.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method self<null> batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch of companies by ID.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static self<Objects\CrmObject|object> batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch of companies.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method self<Objects\CrmObject|object> batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch of companies.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static self<Objects\CrmObject|object> batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch of companies by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method self<Objects\CrmObject|object> batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch of companies by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static self<Objects\CrmObject|object> batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch of companies.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method self<Objects\CrmObject|object> batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch of companies.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static self<Objects\CrmObject|object> search(array|Body\HubspotSearchBody $requestBody) Search companies.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method self<Objects\CrmObject|object> search(array|Body\HubspotSearchBody $requestBody) Search companies.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static self<null> merge(array $requestBody) Merge two companies with same type.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method self<null> merge(array $requestBody) Merge two companies with same type.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static self<null> createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update company if id is not null.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method self<null> createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update company if id is not null.
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method static self<null> importAll(callable $fn) (Handler) Import All Companies using offset and getAll
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 * @method self<null> importAll(callable $fn) (Handler) Import All Companies using offset and getAll
 * See https://developers.hubspot.com/docs/api/crm/companies
 *
 */
class CompanyHubspot extends Hubspot implements CrmHubspotInterface
{
    protected string $resource = "companies-v3";

    protected int $version = 3;
}