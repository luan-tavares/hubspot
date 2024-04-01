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
 * @link https://developers.hubspot.com/docs/api/crm/products
 *
 * @method static self<array<int, object>, object> getAll() Read a page of products. Control what is returned via the properties query param.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method self<array<int, object>, object> getAll() Read a page of products. Control what is returned via the properties query param.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method static self<object, null> get(int|string $productId) Read an product identified by {productId}.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method self<object, null> get(int|string $productId) Read an product identified by {productId}.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method static self<object, null> create(array|Body\HubspotCrmCreateBody $requestBody) Create a product with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method self<object, null> create(array|Body\HubspotCrmCreateBody $requestBody) Create a product with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method static self<object, null> update(int|string $productId, array|Body\HubspotCrmUpdateBody $requestBody) Perform a partial update of an product identified by {productId}.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method self<object, null> update(int|string $productId, array|Body\HubspotCrmUpdateBody $requestBody) Perform a partial update of an product identified by {productId}.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method static self<object, null> delete(int|string $productId) Move an product identified by {productId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method self<object, null> delete(int|string $productId) Move an product identified by {productId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method static self<array<int, object>, object> getAssociations(int|string $productId, int|string $toObjectType) List associations of a product by type.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method self<array<int, object>, object> getAssociations(int|string $productId, int|string $toObjectType) List associations of a product by type.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method static self<object, null> createAssociation(int|string $productId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a product with another object.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method self<object, null> createAssociation(int|string $productId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a product with another object.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method static self<object, null> removeAssociation(int|string $productId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between products and an object.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method self<object, null> removeAssociation(int|string $productId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between products and an object.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method static self<object, null> batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch of products by ID.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method self<object, null> batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch of products by ID.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method static self<array<int, object>, object> batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch of products.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method self<array<int, object>, object> batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch of products.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method static self<array<int, object>, object> batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch of products by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method self<array<int, object>, object> batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch of products by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method static self<array<int, object>, object> batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch of products.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method self<array<int, object>, object> batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch of products.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method static self<array<int, object>, object> search(array|Body\HubspotSearchBody $requestBody) Search products.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method self<array<int, object>, object> search(array|Body\HubspotSearchBody $requestBody) Search products.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method static self<object, null> merge(array $requestBody) Merge two products with same type.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method self<object, null> merge(array $requestBody) Merge two products with same type.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method static self<object, null> createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update product if id exists.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method self<object, null> createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update product if id exists.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 */
class ProductHubspot extends Hubspot
{
    protected string $resource = "products-v3";

    protected int $version = 3;
}