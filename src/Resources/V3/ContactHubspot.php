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
 * @link https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static self<object> getAll() Read a page of contacts. Control what is returned via the properties query param.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method self<object> getAll() Read a page of contacts. Control what is returned via the properties query param.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static self<null> get(int|string $contactIdOrEmail) Read an contact identified by {contactIdOrEmail}.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method self<null> get(int|string $contactIdOrEmail) Read an contact identified by {contactIdOrEmail}.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static self<null> getByEmail(int|string $contactEmail) Read an contact identified by {contactEmail}.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method self<null> getByEmail(int|string $contactEmail) Read an contact identified by {contactEmail}.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static self<null> create(array|Body\HubspotCrmCreateBody $requestBody) Create a contact with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method self<null> create(array|Body\HubspotCrmCreateBody $requestBody) Create a contact with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static self<null> update(int|string $contactIdOrEmail, array|Body\HubspotCrmUpdateBody $requestBody) Perform a partial update of an contact identified by {contactIdOrEmail}.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method self<null> update(int|string $contactIdOrEmail, array|Body\HubspotCrmUpdateBody $requestBody) Perform a partial update of an contact identified by {contactIdOrEmail}.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static self<null> delete(int|string $contactId) Move an contact identified by {contactId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method self<null> delete(int|string $contactId) Move an contact identified by {contactId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static self<null> gdprDelete(array $requestBody) Permanently delete a contact and all associated content to follow GDPR.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method self<null> gdprDelete(array $requestBody) Permanently delete a contact and all associated content to follow GDPR.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static self<object> getAssociations(int|string $contactId, int|string $toObjectType) List associations of a contact by type.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method self<object> getAssociations(int|string $contactId, int|string $toObjectType) List associations of a contact by type.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static self<null> createAssociation(int|string $contactId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a contact with another object.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method self<null> createAssociation(int|string $contactId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a contact with another object.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static self<null> removeAssociation(int|string $contactId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between a contact and an object.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method self<null> removeAssociation(int|string $contactId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between a contact and an object.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static self<null> batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch of contacts by ID.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method self<null> batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch of contacts by ID.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static self<object> batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch of contacts.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method self<object> batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch of contacts.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static self<object> batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch of contacts by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method self<object> batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch of contacts by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static self<object> batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch of contacts.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method self<object> batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch of contacts.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static self<object> batchUpsert(array $requestBody) Upsert a batch of contacts.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method self<object> batchUpsert(array $requestBody) Upsert a batch of contacts.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static self<object> search(array|Body\HubspotSearchBody $requestBody) Search contacts.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method self<object> search(array|Body\HubspotSearchBody $requestBody) Search contacts.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static self<null> merge(array $requestBody) Merge two contacts with same type.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method self<null> merge(array $requestBody) Merge two contacts with same type.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static self<null> createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update contact if id is not null.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method self<null> createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update contact if id is not null.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static self<null> importAll(callable $fn) (Handler) Import All Contacts using offset and getAll
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method self<null> importAll(callable $fn) (Handler) Import All Contacts using offset and getAll
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static self<null> createOrUpdateByEmail(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Create or Update If Email Exists
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method self<null> createOrUpdateByEmail(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Create or Update If Email Exists
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 */
class ContactHubspot extends Hubspot implements CrmHubspotInterface
{
    protected string $resource = "contacts-v3";

    protected int $version = 3;
}