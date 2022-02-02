<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
* @method static $this getAll() Read a page of notes. Control what is returned via the properties query param.
* @method $this getAll() Read a page of notes. Control what is returned via the properties query param.
* @method static $this get(int|string $noteId) Read an note identified by {noteId}.
* @method $this get(int|string $noteId) Read an note identified by {noteId}.
* @method static $this create(array $requestBody) Create a note with the given properties and return a copy of the object, including the ID.
* @method $this create(array $requestBody) Create a note with the given properties and return a copy of the object, including the ID.
* @method static $this update(int|string $noteId, array $requestBody) Perform a partial update of an note identified by {noteId}.
* @method $this update(int|string $noteId, array $requestBody) Perform a partial update of an note identified by {noteId}.
* @method static $this delete(int|string $noteId) Move an note identified by {noteId} to the recycling bin.
* @method $this delete(int|string $noteId) Move an note identified by {noteId} to the recycling bin.
* @method static $this getAssociations(int|string $noteId, int|string $toObjectType) List associations of a note by type.
* @method $this getAssociations(int|string $noteId, int|string $toObjectType) List associations of a note by type.
* @method static $this createAssociation(int|string $noteId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a note with another object.
* @method $this createAssociation(int|string $noteId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a note with another object.
* @method static $this removeAssociation(int|string $noteId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between ticket and an object.
* @method $this removeAssociation(int|string $noteId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between ticket and an object.
* @method static $this batchDelete(array $requestBody) Archive a batch of notes by ID.
* @method $this batchDelete(array $requestBody) Archive a batch of notes by ID.
* @method static $this batchCreate(array $requestBody) Create a batch of notes.
* @method $this batchCreate(array $requestBody) Create a batch of notes.
* @method static $this batchRead(array $requestBody) Read a batch of notes by internal ID, or unique property values.
* @method $this batchRead(array $requestBody) Read a batch of notes by internal ID, or unique property values.
* @method static $this batchUpdate(array $requestBody) Update a batch of notes.
* @method $this batchUpdate(array $requestBody) Update a batch of notes.
* @method static $this search(array $requestBody) Search notes.
* @method $this search(array $requestBody) Search notes.
 */
class NoteHubspot extends Hubspot
{
    protected string $resource = "engagements-notes-v3";
}
