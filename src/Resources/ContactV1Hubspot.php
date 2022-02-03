<?php

namespace LTL\Hubspot\Resources;

use LTL\Hubspot\Hubspot;

/**
 * @method static $this getAll() 
 * See 
 *
 * @method $this getAll() 
 * See 
 *
 * @method static $this get(int|string $vid) 
 * See 
 *
 * @method $this get(int|string $vid) 
 * See 
 *
 * @method static $this getByEmail(int|string $email) 
 * See 
 *
 * @method $this getByEmail(int|string $email) 
 * See 
 *
 * @method static $this getRecentlyUpdated() 
 * See 
 *
 * @method $this getRecentlyUpdated() 
 * See 
 *
 * @method static $this getRecentlyCreated() 
 * See 
 *
 * @method $this getRecentlyCreated() 
 * See 
 *
 * @method static $this getBatch() 
 * See 
 *
 * @method $this getBatch() 
 * See 
 *
 * @method static $this getBatchByEmail() 
 * See 
 *
 * @method $this getBatchByEmail() 
 * See 
 *
 * @method static $this create(array $requestBody) 
 * See 
 *
 * @method $this create(array $requestBody) 
 * See 
 *
 * @method static $this updateById(int|string $vid, array $requestBody) 
 * See 
 *
 * @method $this updateById(int|string $vid, array $requestBody) 
 * See 
 *
 * @method static $this updateByEmail(int|string $email, array $requestBody) 
 * See 
 *
 * @method $this updateByEmail(int|string $email, array $requestBody) 
 * See 
 *
 * @method static $this createOrUpdate(int|string $email, array $requestBody) 
 * See 
 *
 * @method $this createOrUpdate(int|string $email, array $requestBody) 
 * See 
 *
 * @method static $this batchCreateOrUpdate(array $requestBody) 
 * See 
 *
 * @method $this batchCreateOrUpdate(array $requestBody) 
 * See 
 *
 * @method static $this delete(int|string $vid) 
 * See 
 *
 * @method $this delete(int|string $vid) 
 * See 
 *
 * @method static $this merge(int|string $vId, array $requestBody) 
 * See 
 *
 * @method $this merge(int|string $vId, array $requestBody) 
 * See 
 *
 */
class ContactV1Hubspot extends Hubspot
{
    protected string $resource = "contacts-v1";
}
