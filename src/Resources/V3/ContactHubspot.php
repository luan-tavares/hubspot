<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Resources\V3\Interfaces\{CrmHubspotInterface};

/**
 * @link https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static $this getAll() Read a page of contacts. Control what is returned via the properties query param.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method $this getAll() Read a page of contacts. Control what is returned via the properties query param.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static $this get(int|string $contactIdOrEmail) Read an contact identified by {contactIdOrEmail}.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method $this get(int|string $contactIdOrEmail) Read an contact identified by {contactIdOrEmail}.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static $this getByEmail(int|string $contactEmail) Read an contact identified by {contactEmail}.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method $this getByEmail(int|string $contactEmail) Read an contact identified by {contactEmail}.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static $this create(array|Body\HubspotCrmCreateBody $requestBody) Create a contact with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method $this create(array|Body\HubspotCrmCreateBody $requestBody) Create a contact with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static $this update(int|string $contactIdOrEmail, array|Body\HubspotCrmUpdateBody $requestBody) Perform a partial update of an contact identified by {contactIdOrEmail}.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method $this update(int|string $contactIdOrEmail, array|Body\HubspotCrmUpdateBody $requestBody) Perform a partial update of an contact identified by {contactIdOrEmail}.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static $this delete(int|string $contactId) Move an contact identified by {contactId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method $this delete(int|string $contactId) Move an contact identified by {contactId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static $this gdprDelete(array $requestBody) Permanently delete a contact and all associated content to follow GDPR.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method $this gdprDelete(array $requestBody) Permanently delete a contact and all associated content to follow GDPR.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static $this getAssociations(int|string $contactId, int|string $toObjectType) List associations of a contact by type.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method $this getAssociations(int|string $contactId, int|string $toObjectType) List associations of a contact by type.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static $this createAssociation(int|string $contactId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a contact with another object.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method $this createAssociation(int|string $contactId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a contact with another object.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static $this removeAssociation(int|string $contactId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between a contact and an object.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method $this removeAssociation(int|string $contactId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between a contact and an object.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static $this batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch of contacts by ID.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method $this batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch of contacts by ID.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static $this batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch of contacts.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method $this batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch of contacts.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static $this batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch of contacts by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method $this batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch of contacts by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static $this batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch of contacts.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method $this batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch of contacts.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static $this search(array|Body\HubspotSearchBody $requestBody) Search contacts.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method $this search(array|Body\HubspotSearchBody $requestBody) Search contacts.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static $this merge(array $requestBody) Merge two contacts with same type.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method $this merge(array $requestBody) Merge two contacts with same type.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static $this createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update contact if id is not null.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method $this createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update contact if id is not null.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static $this importAll(callable $fn) (Handler) Import All Contacts using offset and getAll
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method $this importAll(callable $fn) (Handler) Import All Contacts using offset and getAll
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static $this createOrUpdateByEmail(LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder|array $requestBody, string|int|null $idHubspot = null) (Handler) Create or Update If Email Exists
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method $this createOrUpdateByEmail(LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder|array $requestBody, string|int|null $idHubspot = null) (Handler) Create or Update If Email Exists
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 */
class ContactHubspot extends Hubspot implements CrmHubspotInterface
{
    protected string $resource = "contacts-v3";

    protected int $version = 3;
}