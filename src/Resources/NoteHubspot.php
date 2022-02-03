<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
 * @method static $this getAll() Read a page of notes. Control what is returned via the properties query param.
 * See https://developers.hubspot.com/docs/api/crm/notes
 *
 * @method $this getAll() Read a page of notes. Control what is returned via the properties query param.
 * See https://developers.hubspot.com/docs/api/crm/notes
 *
 * @method static $this get(int|string $noteId) Read an note identified by {noteId}.
 * See https://developers.hubspot.com/docs/api/crm/notes
 *
 * @method $this get(int|string $noteId) Read an note identified by {noteId}.
 * See https://developers.hubspot.com/docs/api/crm/notes
 *
 * @method static $this create(array $requestBody) Create a note with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/notes
 *
 * @method $this create(array $requestBody) Create a note with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/notes
 *
 * @method static $this update(int|string $noteId, array $requestBody) Perform a partial update of an note identified by {noteId}.
 * See https://developers.hubspot.com/docs/api/crm/notes
 *
 * @method $this update(int|string $noteId, array $requestBody) Perform a partial update of an note identified by {noteId}.
 * See https://developers.hubspot.com/docs/api/crm/notes
 *
 * @method static $this delete(int|string $noteId) Move an note identified by {noteId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/notes
 *
 * @method $this delete(int|string $noteId) Move an note identified by {noteId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/notes
 *
 * @method static $this getAssociations(int|string $noteId, int|string $toObjectType) List associations of a note by type.
 * See https://developers.hubspot.com/docs/api/crm/notes
 *
 * @method $this getAssociations(int|string $noteId, int|string $toObjectType) List associations of a note by type.
 * See https://developers.hubspot.com/docs/api/crm/notes
 *
 * @method static $this createAssociation(int|string $noteId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a note with another object.
 * See https://developers.hubspot.com/docs/api/crm/notes
 *
 * @method $this createAssociation(int|string $noteId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a note with another object.
 * See https://developers.hubspot.com/docs/api/crm/notes
 *
 * @method static $this removeAssociation(int|string $noteId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between ticket and an object.
 * See https://developers.hubspot.com/docs/api/crm/notes
 *
 * @method $this removeAssociation(int|string $noteId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between ticket and an object.
 * See https://developers.hubspot.com/docs/api/crm/notes
 *
 * @method static $this batchDelete(array $requestBody) Archive a batch of notes by ID.
 * See https://developers.hubspot.com/docs/api/crm/notes
 *
 * @method $this batchDelete(array $requestBody) Archive a batch of notes by ID.
 * See https://developers.hubspot.com/docs/api/crm/notes
 *
 * @method static $this batchCreate(array $requestBody) Create a batch of notes.
 * See https://developers.hubspot.com/docs/api/crm/notes
 *
 * @method $this batchCreate(array $requestBody) Create a batch of notes.
 * See https://developers.hubspot.com/docs/api/crm/notes
 *
 * @method static $this batchRead(array $requestBody) Read a batch of notes by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/notes
 *
 * @method $this batchRead(array $requestBody) Read a batch of notes by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/notes
 *
 * @method static $this batchUpdate(array $requestBody) Update a batch of notes.
 * See https://developers.hubspot.com/docs/api/crm/notes
 *
 * @method $this batchUpdate(array $requestBody) Update a batch of notes.
 * See https://developers.hubspot.com/docs/api/crm/notes
 *
 * @method static $this search(array $requestBody) Search notes.
 * See https://developers.hubspot.com/docs/api/crm/notes
 *
 * @method $this search(array $requestBody) Search notes.
 * See https://developers.hubspot.com/docs/api/crm/notes
 *
 */
class NoteHubspot extends Hubspot
{
    protected string $resource = "engagements-notes-v3";
}
