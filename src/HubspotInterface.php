<?php

namespace LTL\Hubspot;

/**
 *
 * Uri Query Methods
 *
 * @method $this query(string $query, ?string $value) 
 * @method static $this query(string $query, ?string $value) 
 * @method $this byEmail() 
 * @method static $this byEmail() 
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
 * @method $this setCount(int $count) 
 * @method static $this setCount(int $count) 
 * @method $this offset(string|int $hubspotId) 
 * @method static $this offset(string|int $hubspotId) 
 * @method $this vidOffset(string|int $hubspotId) 
 * @method static $this vidOffset(string|int $hubspotId) 
 * @method $this timeOffset(string|int $hubspotId) 
 * @method static $this timeOffset(string|int $hubspotId) 
 * @method $this propertiesWithHistory(string $propertiesWithComma) 
 * @method static $this propertiesWithHistory(string $propertiesWithComma) 
 * @method $this properties(string $propertiesWithComma) 
 * @method static $this properties(string $propertiesWithComma) 
 * @method $this associations(string $associationsWithComma) 
 * @method static $this associations(string $associationsWithComma) 
 * @method $this after(?string $after) 
 * @method static $this after(?string $after) 
 * @method $this before(string $before) 
 * @method static $this before(string $before) 
 * @method $this apikey(string $apikey) 
 * @method static $this apikey(string $apikey) 
 * @method $this sort(string ...$arguments) 
 * @method static $this sort(string ...$arguments) 
 * @method $this withProperties(string ...$arguments) 
 * @method static $this withProperties(string ...$arguments) 
 * @method $this withEmails(string ...$arguments) 
 * @method static $this withEmails(string ...$arguments) 
 * @method $this withVids(string ...$arguments) 
 * @method static $this withVids(string ...$arguments) 
 * @method $this withListIds(string ...$arguments) 
 * @method static $this withListIds(string ...$arguments) 
 * @method $this formTypes(string ...$arguments) 
 * @method static $this formTypes(string ...$arguments) 
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
 * @method $this withResponseHeaders() 
 * @method static $this withResponseHeaders() 
 *
 * Others Resources Methods
 *
 * @method $this tooManyRequestsTries(int $tries) 
 * @method static $this tooManyRequestsTries(int $tries) 
 * @method $this exceptionIfRequestError(bool $hasException) 
 * @method static $this exceptionIfRequestError(bool $hasException) 
*/
interface HubspotInterface
{
}
