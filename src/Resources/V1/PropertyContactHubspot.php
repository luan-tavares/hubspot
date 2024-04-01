<?php

namespace LTL\Hubspot\Resources\V1;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TIterator
 * @extends Hubspot<TIterator>
 *
 * @method static self<null> getAll() 
 *
 * @method self<null> getAll() 
 *
 * @method static self<null> get(int|string $property_name) 
 *
 * @method self<null> get(int|string $property_name) 
 *
 * @method static self<null> create(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/v2/create_contacts_property
 *
 * @method self<null> create(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/v2/create_contacts_property
 *
 * @method static self<null> update(int|string $property_name, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/v2/update_contact_property
 *
 * @method self<null> update(int|string $property_name, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/v2/update_contact_property
 *
 * @method static self<null> delete(int|string $property_name) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/v2/delete_contact_property
 *
 * @method self<null> delete(int|string $property_name) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/v2/delete_contact_property
 *
 * @method static self<null> getAllGroups(array $requestBody) 
 *
 * @method self<null> getAllGroups(array $requestBody) 
 *
 * @method static self<null> createGroup(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/v2/create_contacts_property_group
 *
 * @method self<null> createGroup(array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/v2/create_contacts_property_group
 *
 * @method static self<null> updateGroup(int|string $group_name, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/v2/update_contact_property_group
 *
 * @method self<null> updateGroup(int|string $group_name, array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/v2/update_contact_property_group
 *
 */
class PropertyContactHubspot extends Hubspot
{
    protected string $resource = "properties-contacts-v1";

    protected int $version = 1;
}