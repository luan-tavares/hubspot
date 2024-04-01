<?php

namespace LTL\Hubspot\Resources\V1;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TResponse
 * @template TIterator
 * @extends Hubspot<TResponse, TIterator>
 *
 * @method static self<array<int, object>, object> getAll() Get all contact lists.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_lists
 *
 * @method self<array<int, object>, object> getAll() Get all contact lists.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_lists
 *
 * @method static self<object, null> create(array $requestBody) Create a new contact list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/create_list
 *
 * @method self<object, null> create(array $requestBody) Create a new contact list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/create_list
 *
 * @method static self<object, null> update(int|string $listId, array $requestBody) Update a contact list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/update_list
 *
 * @method self<object, null> update(int|string $listId, array $requestBody) Update a contact list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/update_list
 *
 * @method static self<object, null> get(int|string $listId) Get a contact list by its unique ID.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_list
 *
 * @method self<object, null> get(int|string $listId) Get a contact list by its unique ID.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_list
 *
 * @method static self<object, null> delete(int|string $listId) Delete a contact list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/delete_list
 *
 * @method self<object, null> delete(int|string $listId) Delete a contact list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/delete_list
 *
 * @method static self<object, null> batchRead() Get a group of contact lists.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_batch_lists
 *
 * @method self<object, null> batchRead() Get a group of contact lists.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_batch_lists
 *
 * @method static self<array<int, object>, object> getAllStatic() Get static contact lists.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_static_lists
 *
 * @method self<array<int, object>, object> getAllStatic() Get static contact lists.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_static_lists
 *
 * @method static self<array<int, object>, object> getAllDynamic() Get dynamic contact lists (active lists).
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_dynamic_lists
 *
 * @method self<array<int, object>, object> getAllDynamic() Get dynamic contact lists (active lists).
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_dynamic_lists
 *
 * @method static self<array<int, object>, object> getContacts(int|string $listId) Get contacts in a list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_list_contacts
 *
 * @method self<array<int, object>, object> getContacts(int|string $listId) Get contacts in a list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_list_contacts
 *
 * @method static self<array<int, object>, object> getRecentlyContacts(int|string $listId) Get recently added contacts from a list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_list_contacts_recent
 *
 * @method self<array<int, object>, object> getRecentlyContacts(int|string $listId) Get recently added contacts from a list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_list_contacts_recent
 *
 * @method static self<object, null> addContacts(int|string $listId, array $requestBody) Add existing contacts to a list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_list_contacts_recent
 *
 * @method self<object, null> addContacts(int|string $listId, array $requestBody) Add existing contacts to a list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_list_contacts_recent
 *
 * @method static self<object, null> removeContacts(int|string $listId, array $requestBody) Remove an existing contact from a list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/remove_contact_from_list
 *
 * @method self<object, null> removeContacts(int|string $listId, array $requestBody) Remove an existing contact from a list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/remove_contact_from_list
 *
 */
class ContactListHubspot extends Hubspot
{
    protected string $resource = "contacts-lists-v1";

    protected int $version = 1;
}