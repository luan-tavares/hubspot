<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
* @method static $this getAll() Read a page of tickets. Control what is returned via the properties query param.
* @method $this getAll() Read a page of tickets. Control what is returned via the properties query param.
* @method static $this get(int|string $ticketId) Read an Object identified by {ticketId}.
* @method $this get(int|string $ticketId) Read an Object identified by {ticketId}.
* @method static $this create(array $requestBody) Create a ticket with the given properties and return a copy of the object, including the ID.
* @method $this create(array $requestBody) Create a ticket with the given properties and return a copy of the object, including the ID.
* @method static $this update(int|string $ticketId, array $requestBody) Perform a partial update of an Object identified by {ticketId}.
* @method $this update(int|string $ticketId, array $requestBody) Perform a partial update of an Object identified by {ticketId}.
* @method static $this delete(int|string $ticketId) Move an Object identified by {ticketId} to the recycling bin.
* @method $this delete(int|string $ticketId) Move an Object identified by {ticketId} to the recycling bin.
* @method static $this getAssociations(int|string $ticketId, int|string $toObjectType) List associations of a ticket by type.
* @method $this getAssociations(int|string $ticketId, int|string $toObjectType) List associations of a ticket by type.
* @method static $this createAssociation(int|string $ticketId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a ticket with another object.
* @method $this createAssociation(int|string $ticketId, int|string $toObjectType, int|string $toObjectId, int|string $associationType, array $requestBody) Associate a ticket with another object.
* @method static $this removeAssociation(int|string $ticketId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between a ticket and an object.
* @method $this removeAssociation(int|string $ticketId, int|string $toObjectType, int|string $toObjectId, int|string $associationType) Remove an association between a ticket and an object.
* @method static $this batchDelete(array $requestBody) Archive a batch of tickets by ID.
* @method $this batchDelete(array $requestBody) Archive a batch of tickets by ID.
* @method static $this batchCreate(array $requestBody) Create a batch of tickets.
* @method $this batchCreate(array $requestBody) Create a batch of tickets.
* @method static $this batchRead(array $requestBody) Read a batch of tickets by internal ID, or unique property values.
* @method $this batchRead(array $requestBody) Read a batch of tickets by internal ID, or unique property values.
* @method static $this batchUpdate(array $requestBody) Update a batch of tickets.
* @method $this batchUpdate(array $requestBody) Update a batch of tickets.
* @method static $this search(array $requestBody) Search tickets.
* @method $this search(array $requestBody) Search tickets.
 */
class TicketHubspot extends Hubspot
{
    protected string $resource = "tickets-v3";
}
