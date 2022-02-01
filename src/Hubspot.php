<?php

namespace LTL\Hubspot;

use LTL\Hubspot\Core\Resource;

/**
 *
 * Uri Query Methods
 *
 * @method $this query(string $name, array|string|int $value) Add a Query
 * @method static $this query(string $name, array|string|int $value) Add a Query
 * @method $this limit(int $limit) 
 * @method static $this limit(int $limit) 
 * @method $this setCount(int $count) 
 * @method static $this setCount(int $count) 
 * @method $this offset(string|int $hubspotId) 
 * @method static $this offset(string|int $hubspotId) 
 * @method $this vidOffset(string|int $hubspotId) 
 * @method static $this vidOffset(string|int $hubspotId) 
 * @method $this timeOffset(string|int $hubspotId) 
 * @method static $this timeOffset(string|int $hubspotId) 
 * @method $this properties(string $properties) 
 * @method static $this properties(string $properties) 
 * @method $this associations(string $associations) 
 * @method static $this associations(string $associations) 
 * @method $this after(string $after) 
 * @method static $this after(string $after) 
 * @method $this apikey(string $apikey) 
 * @method static $this apikey(string $apikey) 
 * @method $this listProperties(string ...$arguments) 
 * @method static $this listProperties(string ...$arguments) 
 * @method $this listEmails(string ...$arguments) 
 * @method static $this listEmails(string ...$arguments) 
 * @method $this listVids(string ...$arguments) 
 * @method static $this listVids(string ...$arguments) 
 *
 * Uri Header Methods
 *
 * @method $this header(string $name, string $value) 
 * @method static $this header(string $name, string $value) 
 * @method $this oAuth(string $oAuth) 
 * @method static $this oAuth(string $oAuth) 
 * @method $this contentType(string $contentType) 
 * @method static $this contentType(string $contentType) 
 *
 * Uri Curl Methods
 *
 * @method $this progressBar() 
 * @method static $this progressBar() 
*/
 abstract class Hubspot extends Resource
 {
 }
