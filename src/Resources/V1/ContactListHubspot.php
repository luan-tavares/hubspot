<?php

namespace LTL\Hubspot\Resources\V1;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @method static self<object> getAll() Get all contact lists.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_lists
 *
 * @method self<object> getAll() Get all contact lists.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_lists
 *
 * @method static self<null> create(array $requestBody) Create a new contact list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/create_list
 *
 * @method self<null> create(array $requestBody) Create a new contact list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/create_list
 *
 * @method static self<null> update(int|string $listId, array $requestBody) Update a contact list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/update_list
 *
 * @method self<null> update(int|string $listId, array $requestBody) Update a contact list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/update_list
 *
 * @method static self<null> get(int|string $listId) Get a contact list by its unique ID.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_list
 *
 * @method self<null> get(int|string $listId) Get a contact list by its unique ID.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_list
 *
 * @method static self<null> delete(int|string $listId) Delete a contact list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/delete_list
 *
 * @method self<null> delete(int|string $listId) Delete a contact list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/delete_list
 *
 * @method static self<null> batchRead() Get a group of contact lists.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_batch_lists
 *
 * @method self<null> batchRead() Get a group of contact lists.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_batch_lists
 *
 * @method static self<object> getAllStatic() Get static contact lists.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_static_lists
 *
 * @method self<object> getAllStatic() Get static contact lists.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_static_lists
 *
 * @method static self<object> getAllDynamic() Get dynamic contact lists (active lists).
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_dynamic_lists
 *
 * @method self<object> getAllDynamic() Get dynamic contact lists (active lists).
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_dynamic_lists
 *
 * @method static self<object> getContacts(int|string $listId) Get contacts in a list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_list_contacts
 *
 * @method self<object> getContacts(int|string $listId) Get contacts in a list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_list_contacts
 *
 * @method static self<object> getRecentlyContacts(int|string $listId) Get recently added contacts from a list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_list_contacts_recent
 *
 * @method self<object> getRecentlyContacts(int|string $listId) Get recently added contacts from a list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_list_contacts_recent
 *
 * @method static self<null> addContacts(int|string $listId, array $requestBody) Add existing contacts to a list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_list_contacts_recent
 *
 * @method self<null> addContacts(int|string $listId, array $requestBody) Add existing contacts to a list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_list_contacts_recent
 *
 * @method static self<null> removeContacts(int|string $listId, array $requestBody) Remove an existing contact from a list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/remove_contact_from_list
 *
 * @method self<null> removeContacts(int|string $listId, array $requestBody) Remove an existing contact from a list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/remove_contact_from_list
 *
 */
class ContactListHubspot extends Hubspot
{
    protected string $resource = "contacts-lists-v1";

    protected int $version = 1;
}