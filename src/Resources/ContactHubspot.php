<?php

namespace LTL\HubspotApi\Resources;

use LTL\HubspotApi\Hubspot;

/**
* @method static $this list() 
* @method $this list() 
* @method static $this get(int|string $contactId) 
* @method $this get(int|string $contactId) 
* @method static $this create(array $requestBody) 
* @method $this create(array $requestBody) 
* @method static $this archive(int|string $contactId) 
* @method $this archive(int|string $contactId) 
* @method static $this update(int|string $contactId, array $requestBody) 
* @method $this update(int|string $contactId, array $requestBody) 
* @method static $this delete(array $requestBody) 
* @method $this delete(array $requestBody) 
* @method static $this search(array $requestBody) 
* @method $this search(array $requestBody) 
 */
class ContactHubspot extends Hubspot
{
    protected string $resource = "contacts";
}
