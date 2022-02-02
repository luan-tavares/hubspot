<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
* @method static $this getAll() Read a page of contacts. Control what is returned via the properties query param.
* @method $this getAll() Read a page of contacts. Control what is returned via the properties query param.
* @method static $this get(int|string $contactIdOrEmail) Read an contact identified by {contactIdOrEmail}.
* @method $this get(int|string $contactIdOrEmail) Read an contact identified by {contactIdOrEmail}.
* @method static $this create(array $requestBody) Create a contact with the given properties and return a copy of the object, including the ID.
* @method $this create(array $requestBody) Create a contact with the given properties and return a copy of the object, including the ID.
* @method static $this update(int|string $contactIdOrEmail, array $requestBody) Perform a partial update of an contact identified by {contactIdOrEmail}.
* @method $this update(int|string $contactIdOrEmail, array $requestBody) Perform a partial update of an contact identified by {contactIdOrEmail}.
* @method static $this delete(int|string $contactId) Move an contact identified by {contactId} to the recycling bin.
* @method $this delete(int|string $contactId) Move an contact identified by {contactId} to the recycling bin.
* @method static $this gdprDelete(array $requestBody) Permanently delete a contact and all associated content to follow GDPR.
* @method $this gdprDelete(array $requestBody) Permanently delete a contact and all associated content to follow GDPR.
* @method static $this getAssociations(int|string $contactId, int|string $toObjectType) List associations of a contact by type.
* @method $this getAssociations(int|string $contactId, int|string $toObjectType) List associations of a contact by type.
* @method static $this createAssociation(int|string $contactId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a contact with another object.
* @method $this createAssociation(int|string $contactId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a contact with another object.
* @method static $this removeAssociation(int|string $contactId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between a contact and an object.
* @method $this removeAssociation(int|string $contactId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between a contact and an object.
* @method static $this batchDelete(array $requestBody) Archive a batch of contacts by ID.
* @method $this batchDelete(array $requestBody) Archive a batch of contacts by ID.
* @method static $this batchCreate(array $requestBody) Create a batch of contacts.
* @method $this batchCreate(array $requestBody) Create a batch of contacts.
* @method static $this batchRead(array $requestBody) Read a batch of contacts by internal ID, or unique property values.
* @method $this batchRead(array $requestBody) Read a batch of contacts by internal ID, or unique property values.
* @method static $this batchUpdate(array $requestBody) Update a batch of contacts.
* @method $this batchUpdate(array $requestBody) Update a batch of contacts.
* @method static $this search(array $requestBody) Search contacts.
* @method $this search(array $requestBody) Search contacts.
 */
class ContactHubspot extends Hubspot
{
    protected string $resource = "contacts-v3";
}
