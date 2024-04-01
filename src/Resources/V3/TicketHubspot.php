<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;
use LTL\Hubspot\Resources\V3\Interfaces\{CrmHubspotInterface};

/**
 * @template TResponse
 * @template TIterator
 * @extends Hubspot<TResponse, TIterator>
 *
 * @link https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method static self<array<int, object>, object> getAll() Read a page of tickets. Control what is returned via the properties query param.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method self<array<int, object>, object> getAll() Read a page of tickets. Control what is returned via the properties query param.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method static self<object, null> get(int|string $ticketId) Read an ticket identified by {ticketId}.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method self<object, null> get(int|string $ticketId) Read an ticket identified by {ticketId}.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method static self<object, null> create(array|Body\HubspotCrmCreateBody $requestBody) Create a ticket with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method self<object, null> create(array|Body\HubspotCrmCreateBody $requestBody) Create a ticket with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method static self<object, null> update(int|string $ticketId, array|Body\HubspotCrmUpdateBody $requestBody) Perform a partial update of an ticket identified by {ticketId}.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method self<object, null> update(int|string $ticketId, array|Body\HubspotCrmUpdateBody $requestBody) Perform a partial update of an ticket identified by {ticketId}.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method static self<object, null> delete(int|string $ticketId) Move an ticket identified by {ticketId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method self<object, null> delete(int|string $ticketId) Move an ticket identified by {ticketId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method static self<array<int, object>, object> getAssociations(int|string $ticketId, int|string $toObjectType) List associations of a ticket by type.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method self<array<int, object>, object> getAssociations(int|string $ticketId, int|string $toObjectType) List associations of a ticket by type.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method static self<object, null> createAssociation(int|string $ticketId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a ticket with another object.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method self<object, null> createAssociation(int|string $ticketId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a ticket with another object.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method static self<object, null> removeAssociation(int|string $ticketId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between a ticket and an object.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method self<object, null> removeAssociation(int|string $ticketId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between a ticket and an object.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method static self<object, null> batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch of tickets by ID.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method self<object, null> batchDelete(array|Body\HubspotBatchDeleteBody $requestBody) Archive a batch of tickets by ID.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method static self<array<int, object>, object> batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch of tickets.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method self<array<int, object>, object> batchCreate(array|Body\HubspotBatchCreateBody $requestBody) Create a batch of tickets.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method static self<array<int, object>, object> batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch of tickets by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method self<array<int, object>, object> batchRead(array|Body\HubspotBatchReadBody $requestBody) Read a batch of tickets by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method static self<array<int, object>, object> batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch of tickets.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method self<array<int, object>, object> batchUpdate(array|Body\HubspotBatchUpdateBody $requestBody) Update a batch of tickets.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method static self<array<int, object>, object> search(array|Body\HubspotSearchBody $requestBody) Search tickets.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method self<array<int, object>, object> search(array|Body\HubspotSearchBody $requestBody) Search tickets.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method static self<object, null> merge(array $requestBody) Merge two tickets with same type.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method self<object, null> merge(array $requestBody) Merge two tickets with same type.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method static self<object, null> createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update ticket if id exists.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method self<object, null> createOrUpdate(Body\HubspotCrmUpdateBody|array $requestBody, string|int|null $idHubspot = null) (Handler) Use Create or Update ticket if id exists.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method static self<object, null> importAll(callable $fn) (Handler) Import All Deals using offset and getAll
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method self<object, null> importAll(callable $fn) (Handler) Import All Deals using offset and getAll
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 */
class TicketHubspot extends Hubspot implements CrmHubspotInterface
{
    protected string $resource = "tickets-v3";

    protected int $version = 3;
}