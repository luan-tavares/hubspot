<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TResponse
 * @template TIterator
 * @extends Hubspot<TResponse, TIterator>
 *
 * @link https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method static self<array<int, object>, object> getAll() Read a page of quotes. Control what is returned via the properties query param.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method self<array<int, object>, object> getAll() Read a page of quotes. Control what is returned via the properties query param.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method static self<object, null> get(int|string $quoteId) Read an quote identified by {quoteId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method self<object, null> get(int|string $quoteId) Read an quote identified by {quoteId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method static self<object, null> create(array $requestBody) Create a quote with the given properties and return a copy of the object, including the ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method self<object, null> create(array $requestBody) Create a quote with the given properties and return a copy of the object, including the ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method static self<object, null> update(int|string $quoteId, array $requestBody) Perform a partial update of an quote identified by {quoteId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method self<object, null> update(int|string $quoteId, array $requestBody) Perform a partial update of an quote identified by {quoteId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method static self<object, null> delete(int|string $quoteId) Move an quote identified by {quoteId} to the recycling bin.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method self<object, null> delete(int|string $quoteId) Move an quote identified by {quoteId} to the recycling bin.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method static self<array<int, object>, object> getAssociations(int|string $quoteId, int|string $toObjectType) List associations of a quote by type.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method self<array<int, object>, object> getAssociations(int|string $quoteId, int|string $toObjectType) List associations of a quote by type.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method static self<object, null> createAssociation(int|string $quoteId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a quote with another object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method self<object, null> createAssociation(int|string $quoteId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a quote with another object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method static self<object, null> removeAssociation(int|string $quoteId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between a quote and an object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method self<object, null> removeAssociation(int|string $quoteId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between a quote and an object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method static self<object, null> batchDelete(array $requestBody) Archive a batch of quotes by ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method self<object, null> batchDelete(array $requestBody) Archive a batch of quotes by ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method static self<array<int, object>, object> batchCreate(array $requestBody) Create a batch of quotes.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method self<array<int, object>, object> batchCreate(array $requestBody) Create a batch of quotes.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method static self<array<int, object>, object> batchRead(array $requestBody) Read a batch of quotes by internal ID, or unique property values.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method self<array<int, object>, object> batchRead(array $requestBody) Read a batch of quotes by internal ID, or unique property values.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method static self<array<int, object>, object> batchUpdate(array $requestBody) Update a batch of quotes.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method self<array<int, object>, object> batchUpdate(array $requestBody) Update a batch of quotes.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method static self<array<int, object>, object> search(array $requestBody) Search quotes.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method self<array<int, object>, object> search(array $requestBody) Search quotes.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method static self<object, null> merge(array $requestBody) Merge two quotes with same type.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method self<object, null> merge(array $requestBody) Merge two quotes with same type.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method static self<object, null> createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update quote if id exists.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method self<object, null> createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update quote if id exists.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 */
class QuoteHubspot extends Hubspot
{
    protected string $resource = "quotes-v3";

    protected int $version = 3;
}