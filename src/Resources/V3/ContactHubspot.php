<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;

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
 * @method static $this create(BaseBodyBuilder|array $requestBody) Create a contact with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method $this create(BaseBodyBuilder|array $requestBody) Create a contact with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static $this update(int|string $contactIdOrEmail, BaseBodyBuilder|array $requestBody) Perform a partial update of an contact identified by {contactIdOrEmail}.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method $this update(int|string $contactIdOrEmail, BaseBodyBuilder|array $requestBody) Perform a partial update of an contact identified by {contactIdOrEmail}.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static $this delete(int|string $contactId) Move an contact identified by {contactId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method $this delete(int|string $contactId) Move an contact identified by {contactId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static $this gdprDelete(BaseBodyBuilder|array $requestBody) Permanently delete a contact and all associated content to follow GDPR.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method $this gdprDelete(BaseBodyBuilder|array $requestBody) Permanently delete a contact and all associated content to follow GDPR.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static $this getAssociations(int|string $contactId, int|string $toObjectType) List associations of a contact by type.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method $this getAssociations(int|string $contactId, int|string $toObjectType) List associations of a contact by type.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static $this createAssociation(int|string $contactId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, BaseBodyBuilder|array $requestBody) Associate a contact with another object.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method $this createAssociation(int|string $contactId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, BaseBodyBuilder|array $requestBody) Associate a contact with another object.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static $this removeAssociation(int|string $contactId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between a contact and an object.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method $this removeAssociation(int|string $contactId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between a contact and an object.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static $this batchDelete(BaseBodyBuilder|array $requestBody) Archive a batch of contacts by ID.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method $this batchDelete(BaseBodyBuilder|array $requestBody) Archive a batch of contacts by ID.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static $this batchCreate(BaseBodyBuilder|array $requestBody) Create a batch of contacts.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method $this batchCreate(BaseBodyBuilder|array $requestBody) Create a batch of contacts.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static $this batchRead(BaseBodyBuilder|array $requestBody) Read a batch of contacts by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method $this batchRead(BaseBodyBuilder|array $requestBody) Read a batch of contacts by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static $this batchUpdate(BaseBodyBuilder|array $requestBody) Update a batch of contacts.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method $this batchUpdate(BaseBodyBuilder|array $requestBody) Update a batch of contacts.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static $this search(BaseBodyBuilder|array $requestBody) Search contacts.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method $this search(BaseBodyBuilder|array $requestBody) Search contacts.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method static $this merge(BaseBodyBuilder|array $requestBody) Merge two contacts with same type.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 * @method $this merge(BaseBodyBuilder|array $requestBody) Merge two contacts with same type.
 * See https://developers.hubspot.com/docs/api/crm/contacts
 *
 */
class ContactHubspot extends Hubspot
{
    protected string $resource = "contacts-v3";

    protected int $version = 3;
}
