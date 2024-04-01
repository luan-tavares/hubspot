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
 * @method static self<object, null> getAll() 
 *
 * @method self<object, null> getAll() 
 *
 * @method static self<object, null> get(int|string $property_name) 
 *
 * @method self<object, null> get(int|string $property_name) 
 *
 * @method static self<object, null> create(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/v2/create_contacts_property
 *
 * @method self<object, null> create(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/v2/create_contacts_property
 *
 * @method static self<object, null> update(int|string $property_name, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/v2/update_contact_property
 *
 * @method self<object, null> update(int|string $property_name, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/v2/update_contact_property
 *
 * @method static self<object, null> delete(int|string $property_name) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/v2/delete_contact_property
 *
 * @method self<object, null> delete(int|string $property_name) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/v2/delete_contact_property
 *
 * @method static self<object, null> getAllGroups(array $requestBody) 
 *
 * @method self<object, null> getAllGroups(array $requestBody) 
 *
 * @method static self<object, null> createGroup(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/v2/create_contacts_property_group
 *
 * @method self<object, null> createGroup(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/v2/create_contacts_property_group
 *
 * @method static self<object, null> updateGroup(int|string $group_name, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/v2/update_contact_property_group
 *
 * @method self<object, null> updateGroup(int|string $group_name, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/v2/update_contact_property_group
 *
 */
class PropertyContactHubspot extends Hubspot
{
    protected string $resource = "properties-contacts-v1";

    protected int $version = 1;
}