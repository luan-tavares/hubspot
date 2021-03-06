<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;

/**
 * @link https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method static $this getAll() Read a page of notes. Control what is returned via the properties query param.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method $this getAll() Read a page of notes. Control what is returned via the properties query param.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method static $this get(int|string $noteId) Read an note identified by {noteId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method $this get(int|string $noteId) Read an note identified by {noteId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method static $this create(BaseBodyBuilder|array $requestBody) Create a note with the given properties and return a copy of the object, including the ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method $this create(BaseBodyBuilder|array $requestBody) Create a note with the given properties and return a copy of the object, including the ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method static $this update(int|string $noteId, BaseBodyBuilder|array $requestBody) Perform a partial update of an note identified by {noteId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method $this update(int|string $noteId, BaseBodyBuilder|array $requestBody) Perform a partial update of an note identified by {noteId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method static $this delete(int|string $noteId) Move an note identified by {noteId} to the recycling bin.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method $this delete(int|string $noteId) Move an note identified by {noteId} to the recycling bin.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method static $this getAssociations(int|string $noteId, int|string $toObjectType) List associations of a note by type.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method $this getAssociations(int|string $noteId, int|string $toObjectType) List associations of a note by type.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method static $this createAssociation(int|string $noteId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Associate a note with another object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method $this createAssociation(int|string $noteId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Associate a note with another object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method static $this removeAssociation(int|string $noteId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between ticket and an object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method $this removeAssociation(int|string $noteId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between ticket and an object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method static $this batchDelete(BaseBodyBuilder|array $requestBody) Archive a batch of notes by ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method $this batchDelete(BaseBodyBuilder|array $requestBody) Archive a batch of notes by ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method static $this batchCreate(BaseBodyBuilder|array $requestBody) Create a batch of notes.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method $this batchCreate(BaseBodyBuilder|array $requestBody) Create a batch of notes.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method static $this batchRead(BaseBodyBuilder|array $requestBody) Read a batch of notes by internal ID, or unique property values.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method $this batchRead(BaseBodyBuilder|array $requestBody) Read a batch of notes by internal ID, or unique property values.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method static $this batchUpdate(BaseBodyBuilder|array $requestBody) Update a batch of notes.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method $this batchUpdate(BaseBodyBuilder|array $requestBody) Update a batch of notes.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method static $this search(BaseBodyBuilder|array $requestBody) Search notes.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method $this search(BaseBodyBuilder|array $requestBody) Search notes.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method static $this merge(BaseBodyBuilder|array $requestBody) Merge two notes with same type
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method $this merge(BaseBodyBuilder|array $requestBody) Merge two notes with same type
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 */
class EngagementNoteHubspot extends Hubspot
{
    protected string $resource = "engagements-notes-v3";

    protected int $version = 3;
}
