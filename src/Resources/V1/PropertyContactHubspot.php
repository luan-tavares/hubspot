<?php

namespace LTL\Hubspot\Resources\V1;

use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;

/**
 * @method static $this getAll() 
 *
 * @method $this getAll() 
 *
 * @method static $this get(int|string $property_name) 
 *
 * @method $this get(int|string $property_name) 
 *
 * @method static $this create(BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/v2/create_contacts_property
 *
 * @method $this create(BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/v2/create_contacts_property
 *
 * @method static $this update(int|string $property_name, BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/v2/update_contact_property
 *
 * @method $this update(int|string $property_name, BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/v2/update_contact_property
 *
 * @method static $this delete(int|string $property_name) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/v2/delete_contact_property
 *
 * @method $this delete(int|string $property_name) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/v2/delete_contact_property
 *
 * @method static $this getAllGroups(BaseBodyBuilder|array $requestBody) 
 *
 * @method $this getAllGroups(BaseBodyBuilder|array $requestBody) 
 *
 * @method static $this createGroup(BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/v2/create_contacts_property_group
 *
 * @method $this createGroup(BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/v2/create_contacts_property_group
 *
 * @method static $this updateGroup(int|string $group_name, BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/v2/update_contact_property_group
 *
 * @method $this updateGroup(int|string $group_name, BaseBodyBuilder|array $requestBody) 
 * See https://legacydocs.hubspot.com/docs/methods/contacts/v2/update_contact_property_group
 *
 */
class PropertyContactHubspot extends Hubspot
{
    protected string $resource = "properties-contacts-v1";

    protected int $version = 1;
}