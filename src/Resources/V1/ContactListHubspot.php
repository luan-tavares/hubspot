<?php

namespace LTL\Hubspot\Resources\V1;

use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;

/**
 * @method static $this getAll() Get all contact lists.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_lists
 *
 * @method $this getAll() Get all contact lists.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_lists
 *
 * @method static $this create(BaseBodyBuilder|array $requestBody) Create a new contact list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/create_list
 *
 * @method $this create(BaseBodyBuilder|array $requestBody) Create a new contact list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/create_list
 *
 * @method static $this update(int|string $listId, BaseBodyBuilder|array $requestBody) Update a contact list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/update_list
 *
 * @method $this update(int|string $listId, BaseBodyBuilder|array $requestBody) Update a contact list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/update_list
 *
 * @method static $this get(int|string $listId) Get a contact list by its unique ID.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_list
 *
 * @method $this get(int|string $listId) Get a contact list by its unique ID.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_list
 *
 * @method static $this delete(int|string $listId) Delete a contact list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/delete_list
 *
 * @method $this delete(int|string $listId) Delete a contact list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/delete_list
 *
 * @method static $this batchRead() Get a group of contact lists.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_batch_lists
 *
 * @method $this batchRead() Get a group of contact lists.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_batch_lists
 *
 * @method static $this getAllStatic() Get static contact lists.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_static_lists
 *
 * @method $this getAllStatic() Get static contact lists.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_static_lists
 *
 * @method static $this getAllDynamic() Get dynamic contact lists (active lists).
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_dynamic_lists
 *
 * @method $this getAllDynamic() Get dynamic contact lists (active lists).
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_dynamic_lists
 *
 * @method static $this getContacts(int|string $listId) Get contacts in a list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_list_contacts
 *
 * @method $this getContacts(int|string $listId) Get contacts in a list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_list_contacts
 *
 * @method static $this getRecentlyContacts(int|string $listId) Get recently added contacts from a list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_list_contacts_recent
 *
 * @method $this getRecentlyContacts(int|string $listId) Get recently added contacts from a list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_list_contacts_recent
 *
 * @method static $this addContacts(int|string $listId, BaseBodyBuilder|array $requestBody) Add existing contacts to a list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_list_contacts_recent
 *
 * @method $this addContacts(int|string $listId, BaseBodyBuilder|array $requestBody) Add existing contacts to a list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/get_list_contacts_recent
 *
 * @method static $this removeContacts(int|string $listId, BaseBodyBuilder|array $requestBody) Remove an existing contact from a list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/remove_contact_from_list
 *
 * @method $this removeContacts(int|string $listId, BaseBodyBuilder|array $requestBody) Remove an existing contact from a list.
 * See https://legacydocs.hubspot.com/docs/methods/lists/remove_contact_from_list
 *
 */
class ContactListHubspot extends Hubspot
{
    protected string $resource = "contacts-lists-v1";

    protected int $version = 1;
}