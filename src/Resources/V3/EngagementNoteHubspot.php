<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;
use LTL\Hubspot\Resources\V3\Interfaces\{EngagementHubspotInterface, CrmHubspotInterface};

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @link https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method static self<object> getAll() Read a page of notes. Control what is returned via the properties query param.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method self<object> getAll() Read a page of notes. Control what is returned via the properties query param.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method static self<null> get(int|string $noteId) Read an note identified by {noteId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method self<null> get(int|string $noteId) Read an note identified by {noteId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method static self<null> create(array|Body\HubspotCrmCreateBody $requestBody) Create a note with the given properties and return a copy of the object, including the ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method self<null> create(array|Body\HubspotCrmCreateBody $requestBody) Create a note with the given properties and return a copy of the object, including the ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method static self<null> update(int|string $noteId, array|Body\HubspotCrmUpdateBody $requestBody) Perform a partial update of an note identified by {noteId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method self<null> update(int|string $noteId, array|Body\HubspotCrmUpdateBody $requestBody) Perform a partial update of an note identified by {noteId}.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method static self<null> delete(int|string $noteId) Move an note identified by {noteId} to the recycling bin.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method self<null> delete(int|string $noteId) Move an note identified by {noteId} to the recycling bin.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method static self<object> getAssociations(int|string $noteId, int|string $toObjectType) List associations of a note by type.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method self<object> getAssociations(int|string $noteId, int|string $toObjectType) List associations of a note by type.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method static self<null> createAssociation(int|string $noteId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Associate a note with another object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method self<null> createAssociation(int|string $noteId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Associate a note with another object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method static self<null> removeAssociation(int|string $noteId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between ticket and an object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method self<null> removeAssociation(int|string $noteId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between ticket and an object.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method static self<null> batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch of notes by ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method self<null> batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch of notes by ID.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method static self<object> batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch of notes.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method self<object> batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch of notes.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method static self<object> batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch of notes by internal ID, or unique property values.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method self<object> batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch of notes by internal ID, or unique property values.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method static self<object> batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch of notes.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method self<object> batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch of notes.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method static self<object> batchUpsert(array $requestBody) Upsert a batch of notes.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method self<object> batchUpsert(array $requestBody) Upsert a batch of notes.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method static self<object> search(array|Body\HubspotSearchBody $requestBody) Search notes.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method self<object> search(array|Body\HubspotSearchBody $requestBody) Search notes.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method static self<null> merge(array $requestBody) Merge two notes with same type
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method self<null> merge(array $requestBody) Merge two notes with same type
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method static self<null> createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update note if id exists.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method self<null> createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update note if id exists.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method static self<null> importAll(callable $fn) (Handler) Import All Deals using offset and getAll
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 * @method self<null> importAll(callable $fn) (Handler) Import All Deals using offset and getAll
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/crm/v3/objects/notes
 *
 */
class EngagementNoteHubspot extends Hubspot implements EngagementHubspotInterface, CrmHubspotInterface
{
    protected string $resource = "engagements-notes-v3";

    protected int $version = 3;
}