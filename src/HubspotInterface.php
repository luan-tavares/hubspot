<?php

namespace LTL\Hubspot;

use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;

/**
 *
 * @template TIterator
 * @extends Resource<TIterator>
 *
 *
 * Uri Query Methods
 *
 * @method $this query(string $query, ?string $value) 
 * @method static $this query(string $query, ?string $value) 
 * @method $this byEmail() 
 * @method static $this byEmail() 
 * @method $this idProperty(string $propertyUnique) 
 * @method static $this idProperty(string $propertyUnique) 
 * @method $this q(string $query) 
 * @method static $this q(string $query) 
 * @method $this archived() 
 * @method static $this archived() 
 * @method $this includeForeignIds() 
 * @method static $this includeForeignIds() 
 * @method $this format(string $fileFormat) 
 * @method static $this format(string $fileFormat) 
 * @method $this limit(int $limit) 
 * @method static $this limit(int $limit) 
 * @method $this maxLimit() 
 * @method static $this maxLimit() 
 * @method $this setCount(int $count) 
 * @method static $this setCount(int $count) 
 * @method $this offset(string|int $hubspotId) 
 * @method static $this offset(string|int $hubspotId) 
 * @method $this vidOffset(string|int $hubspotId) 
 * @method static $this vidOffset(string|int $hubspotId) 
 * @method $this timeOffset(string|int $hubspotId) 
 * @method static $this timeOffset(string|int $hubspotId) 
 * @method $this propertiesWithHistory(string ...$properties) 
 * @method static $this propertiesWithHistory(string ...$properties) 
 * @method $this properties(string ...$properties) 
 * @method static $this properties(string ...$properties) 
 * @method $this associations(string ...$associations) 
 * @method static $this associations(string ...$associations) 
 * @method $this after(?string $after) 
 * @method static $this after(?string $after) 
 * @method $this before(string $before) 
 * @method static $this before(string $before) 
 * @method $this apikey(string $apikey) 
 * @method static $this apikey(string $apikey) 
 * @method $this sort(string ...$arguments) 
 * @method static $this sort(string ...$arguments) 
 * @method $this withProperties(string ...$property) 
 * @method static $this withProperties(string ...$property) 
 * @method $this withEmails(string ...$email) 
 * @method static $this withEmails(string ...$email) 
 * @method $this withVids(int ...$id) 
 * @method static $this withVids(int ...$id) 
 * @method $this withListIds(int ...$id) 
 * @method static $this withListIds(int ...$id) 
 * @method $this formTypes(string ...$arguments) 
 * @method static $this formTypes(string ...$arguments) 
 * @method $this withListFilters() 
 * @method static $this withListFilters() 
 * @method $this enrollObjectsUpdateList() 
 * @method static $this enrollObjectsUpdateList() 
 * @method $this listIds(int ...$listId) 
 * @method static $this listIds(int ...$listId) 
 *
 * Uri Header Methods
 *
 * @method $this oAuth(string $oAuth) 
 * @method static $this oAuth(string $oAuth) 
 *
 * Uri Curl Methods
 *
 * @method $this withProgressBar() 
 * @method static $this withProgressBar() 
 * @method $this withHeaders() 
 * @method static $this withHeaders() 
 *
 * Others Resources Methods
 *
 * @method $this withRequestTries() 
 * @method static $this withRequestTries() 
 * @method $this withRequestException() 
 * @method static $this withRequestException() 
 * @method $this notWithRequestException() 
 * @method static $this notWithRequestException() 
 *
 * Response Type Methods
 *
 * @method $this withObjectResponse() 
 * @method static $this withObjectResponse() 
 * @method $this notWithObjectResponse() 
 * @method static $this notWithObjectResponse() 
 *
 * Global Methods
 *
 * @method static $this setGlobalApikey(string $apikey) 
 * @method static $this setGlobalOAuth(string $token) 
*/
interface HubspotInterface extends ResourceInterface {}
