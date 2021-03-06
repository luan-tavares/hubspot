<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;

/**
 * @link https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method static $this getAll() Read a page of tickets. Control what is returned via the properties query param.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method $this getAll() Read a page of tickets. Control what is returned via the properties query param.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method static $this get(int|string $ticketId) Read an ticket identified by {ticketId}.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method $this get(int|string $ticketId) Read an ticket identified by {ticketId}.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method static $this create(BaseBodyBuilder|array $requestBody) Create a ticket with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method $this create(BaseBodyBuilder|array $requestBody) Create a ticket with the given properties and return a copy of the object, including the ID.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method static $this update(int|string $ticketId, BaseBodyBuilder|array $requestBody) Perform a partial update of an ticket identified by {ticketId}.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method $this update(int|string $ticketId, BaseBodyBuilder|array $requestBody) Perform a partial update of an ticket identified by {ticketId}.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method static $this delete(int|string $ticketId) Move an ticket identified by {ticketId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method $this delete(int|string $ticketId) Move an ticket identified by {ticketId} to the recycling bin.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method static $this getAssociations(int|string $ticketId, int|string $toObjectType) List associations of a ticket by type.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method $this getAssociations(int|string $ticketId, int|string $toObjectType) List associations of a ticket by type.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method static $this createAssociation(int|string $ticketId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, BaseBodyBuilder|array $requestBody) Associate a ticket with another object.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method $this createAssociation(int|string $ticketId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, BaseBodyBuilder|array $requestBody) Associate a ticket with another object.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method static $this removeAssociation(int|string $ticketId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between a ticket and an object.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method $this removeAssociation(int|string $ticketId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between a ticket and an object.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method static $this batchDelete(BaseBodyBuilder|array $requestBody) Archive a batch of tickets by ID.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method $this batchDelete(BaseBodyBuilder|array $requestBody) Archive a batch of tickets by ID.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method static $this batchCreate(BaseBodyBuilder|array $requestBody) Create a batch of tickets.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method $this batchCreate(BaseBodyBuilder|array $requestBody) Create a batch of tickets.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method static $this batchRead(BaseBodyBuilder|array $requestBody) Read a batch of tickets by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method $this batchRead(BaseBodyBuilder|array $requestBody) Read a batch of tickets by internal ID, or unique property values.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method static $this batchUpdate(BaseBodyBuilder|array $requestBody) Update a batch of tickets.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method $this batchUpdate(BaseBodyBuilder|array $requestBody) Update a batch of tickets.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method static $this search(BaseBodyBuilder|array $requestBody) Search tickets.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method $this search(BaseBodyBuilder|array $requestBody) Search tickets.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method static $this merge(BaseBodyBuilder|array $requestBody) Merge two tickets with same type.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 * @method $this merge(BaseBodyBuilder|array $requestBody) Merge two tickets with same type.
 * See https://developers.hubspot.com/docs/api/crm/tickets
 *
 */
class TicketHubspot extends Hubspot
{
    protected string $resource = "tickets-v3";

    protected int $version = 3;
}
