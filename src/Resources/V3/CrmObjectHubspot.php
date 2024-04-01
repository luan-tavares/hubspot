<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @link https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static self<object> getAll(int|string $objectType) Read a page of objects. Control what is returned via the properties query param.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method self<object> getAll(int|string $objectType) Read a page of objects. Control what is returned via the properties query param.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static self<null> get(int|string $objectType, int|string $objectId) Read an object identified by {objectId}.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method self<null> get(int|string $objectType, int|string $objectId) Read an object identified by {objectId}.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static self<null> create(int|string $objectType, array|Body\HubspotCrmCreateBody $requestBody) Create a CRM object with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method self<null> create(int|string $objectType, array|Body\HubspotCrmCreateBody $requestBody) Create a CRM object with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static self<null> update(int|string $objectType, int|string $objectId, array|Body\HubspotCrmUpdateBody $requestBody) Perform a partial update of an object identified by {objectId}.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method self<null> update(int|string $objectType, int|string $objectId, array|Body\HubspotCrmUpdateBody $requestBody) Perform a partial update of an object identified by {objectId}.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static self<null> delete(int|string $objectType, int|string $objectId) Move an object identified by {objectId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method self<null> delete(int|string $objectType, int|string $objectId) Move an object identified by {objectId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static self<null> gdprDelete(int|string $objectType, array $requestBody) Permanently delete a contact and all associated content to follow GDPR.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method self<null> gdprDelete(int|string $objectType, array $requestBody) Permanently delete a contact and all associated content to follow GDPR.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static self<null> batchDelete(int|string $objectType, array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch of objects by ID.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method self<null> batchDelete(int|string $objectType, array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch of objects by ID.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static self<object> batchCreate(int|string $objectType, array|Body\HubspotBatchCreateBody $requestBody) Create a batch of objects.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method self<object> batchCreate(int|string $objectType, array|Body\HubspotBatchCreateBody $requestBody) Create a batch of objects.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static self<object> batchRead(int|string $objectType, array|Body\HubspotBatchReadBody $requestBody) Read a batch of objects by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method self<object> batchRead(int|string $objectType, array|Body\HubspotBatchReadBody $requestBody) Read a batch of objects by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static self<object> batchUpdate(int|string $objectType, array|Body\HubspotBatchUpdateBody $requestBody) Update a batch of objects.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method self<object> batchUpdate(int|string $objectType, array|Body\HubspotBatchUpdateBody $requestBody) Update a batch of objects.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static self<object> getAssociations(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType) List associations of an object by type.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method self<object> getAssociations(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType) List associations of an object by type.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static self<null> createAssociation(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Associate an object with another object.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method self<null> createAssociation(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Associate an object with another object.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static self<null> removeAssociation(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between two objects.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method self<null> removeAssociation(int|string $fromObjectType, int|string $fromObjectId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between two objects.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static self<object> search(int|string $objectType, array|Body\HubspotSearchBody $requestBody) Search objects by {objectType}.
 * See https://developers.hubspot.com/docs/api/crm/search
 *
 * @method self<object> search(int|string $objectType, array|Body\HubspotSearchBody $requestBody) Search objects by {objectType}.
 * See https://developers.hubspot.com/docs/api/crm/search
 *
 * @method static self<null> merge(int|string $objectType, array $requestBody) Merge two objects with same type.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method self<null> merge(int|string $objectType, array $requestBody) Merge two objects with same type.
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method static self<null> importAll(string $objectType, callable $fn) (Handler) Import All Objects using offset and getAll
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 * @method self<null> importAll(string $objectType, callable $fn) (Handler) Import All Objects using offset and getAll
 * See https://developers.hubspot.com/docs/api/crm/crm-custom-objects
 *
 */
class CrmObjectHubspot extends Hubspot
{
    protected string $resource = "crm-objects-v3";

    protected int $version = 3;
}