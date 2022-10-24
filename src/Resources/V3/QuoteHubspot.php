<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;

/**
 * @link https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method static $this getAll() Read a page of quotes. Control what is returned via the properties query param.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method $this getAll() Read a page of quotes. Control what is returned via the properties query param.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method static $this get(int|string $quoteId) Read an quote identified by {quoteId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method $this get(int|string $quoteId) Read an quote identified by {quoteId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method static $this create(BaseBodyBuilder|array $requestBody) Create a quote with the given properties and return a copy of the object, including the ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method $this create(BaseBodyBuilder|array $requestBody) Create a quote with the given properties and return a copy of the object, including the ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method static $this update(int|string $quoteId, BaseBodyBuilder|array $requestBody) Perform a partial update of an quote identified by {quoteId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method $this update(int|string $quoteId, BaseBodyBuilder|array $requestBody) Perform a partial update of an quote identified by {quoteId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method static $this delete(int|string $quoteId) Move an quote identified by {quoteId} to the recycling bin.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method $this delete(int|string $quoteId) Move an quote identified by {quoteId} to the recycling bin.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method static $this getAssociations(int|string $quoteId, int|string $toObjectType) List associations of a quote by type.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method $this getAssociations(int|string $quoteId, int|string $toObjectType) List associations of a quote by type.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method static $this createAssociation(int|string $quoteId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, BaseBodyBuilder|array $requestBody) Associate a quote with another object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method $this createAssociation(int|string $quoteId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, BaseBodyBuilder|array $requestBody) Associate a quote with another object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method static $this removeAssociation(int|string $quoteId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between a quote and an object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method $this removeAssociation(int|string $quoteId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between a quote and an object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method static $this batchDelete(BaseBodyBuilder|array $requestBody) Archive a batch of quotes by ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method $this batchDelete(BaseBodyBuilder|array $requestBody) Archive a batch of quotes by ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method static $this batchCreate(BaseBodyBuilder|array $requestBody) Create a batch of quotes.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method $this batchCreate(BaseBodyBuilder|array $requestBody) Create a batch of quotes.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method static $this batchRead(BaseBodyBuilder|array $requestBody) Read a batch of quotes by internal ID, or unique property values.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method $this batchRead(BaseBodyBuilder|array $requestBody) Read a batch of quotes by internal ID, or unique property values.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method static $this batchUpdate(BaseBodyBuilder|array $requestBody) Update a batch of quotes.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method $this batchUpdate(BaseBodyBuilder|array $requestBody) Update a batch of quotes.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method static $this search(BaseBodyBuilder|array $requestBody) Search quotes.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method $this search(BaseBodyBuilder|array $requestBody) Search quotes.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method static $this merge(BaseBodyBuilder|array $requestBody) Merge two quotes with same type.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method $this merge(BaseBodyBuilder|array $requestBody) Merge two quotes with same type.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method static $this createOrUpdate(LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder|array $requestBody, string|int|null $hubspotId) (Handler) Use Create or Update quote if id exists.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 * @method $this createOrUpdate(LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder|array $requestBody, string|int|null $hubspotId) (Handler) Use Create or Update quote if id exists.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/quotes
 *
 */
class QuoteHubspot extends Hubspot
{
    protected string $resource = "quotes-v3";

    protected int $version = 3;
}
