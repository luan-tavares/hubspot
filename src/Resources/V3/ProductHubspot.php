<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;

/**
 * @link https://developers.hubspot.com/docs/api/crm/products
 *
 * @method static $this getAll() Read a page of products. Control what is returned via the properties query param.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method $this getAll() Read a page of products. Control what is returned via the properties query param.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method static $this get(int|string $productId) Read an product identified by {productId}.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method $this get(int|string $productId) Read an product identified by {productId}.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method static $this create(BaseBodyBuilder|array $requestBody) Create a product with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method $this create(BaseBodyBuilder|array $requestBody) Create a product with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method static $this update(int|string $productId, BaseBodyBuilder|array $requestBody) Perform a partial update of an product identified by {productId}.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method $this update(int|string $productId, BaseBodyBuilder|array $requestBody) Perform a partial update of an product identified by {productId}.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method static $this delete(int|string $productId) Move an product identified by {productId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method $this delete(int|string $productId) Move an product identified by {productId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method static $this getAssociations(int|string $productId, int|string $toObjectType) List associations of a product by type.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method $this getAssociations(int|string $productId, int|string $toObjectType) List associations of a product by type.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method static $this createAssociation(int|string $productId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, BaseBodyBuilder|array $requestBody) Associate a product with another object.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method $this createAssociation(int|string $productId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, BaseBodyBuilder|array $requestBody) Associate a product with another object.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method static $this removeAssociation(int|string $productId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between products and an object.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method $this removeAssociation(int|string $productId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between products and an object.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method static $this batchDelete(BaseBodyBuilder|array $requestBody) Archive a batch of products by ID.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method $this batchDelete(BaseBodyBuilder|array $requestBody) Archive a batch of products by ID.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method static $this batchCreate(BaseBodyBuilder|array $requestBody) Create a batch of products.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method $this batchCreate(BaseBodyBuilder|array $requestBody) Create a batch of products.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method static $this batchRead(BaseBodyBuilder|array $requestBody) Read a batch of products by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method $this batchRead(BaseBodyBuilder|array $requestBody) Read a batch of products by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method static $this batchUpdate(BaseBodyBuilder|array $requestBody) Update a batch of products.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method $this batchUpdate(BaseBodyBuilder|array $requestBody) Update a batch of products.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method static $this search(BaseBodyBuilder|array $requestBody) Search products.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method $this search(BaseBodyBuilder|array $requestBody) Search products.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method static $this merge(BaseBodyBuilder|array $requestBody) Merge two products with same type.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 * @method $this merge(BaseBodyBuilder|array $requestBody) Merge two products with same type.
 * See https://developers.hubspot.com/docs/api/crm/products
 *
 */
class ProductHubspot extends Hubspot
{
    protected string $resource = "products-v3";

    protected int $version = 3;
}
