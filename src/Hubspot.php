<?php

namespace LTL\Hubspot;

use LTL\Hubspot\Concerns\ExceptionIfRequestError;
use LTL\Hubspot\Concerns\MaxLimit;
use LTL\Hubspot\Concerns\TooManyRequestsTries;
use LTL\Hubspot\Concerns\WithHeaders;
use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Resource\Resource;
use ReflectionClass;

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
 * @method $this tooManyRequestsTries()
 * @method static $this tooManyRequestsTries()
 * @method $this exceptionIfRequestError(bool $hasException)
 * @method static $this exceptionIfRequestError(bool $hasException)
 *
 * Global Methods
 *
 * @method static $this setGlobalApikey(string $apikey)
 * @method static $this setGlobalOAuth(string $token)
 */
abstract class Hubspot extends Resource
{
    protected array $properties;

    protected array $associations;

    protected array $propertiesWithHistory;
    
    public function __construct()
    {
        $reflectionClass = new ReflectionClass($this);

        $interfaces = $reflectionClass->getInterfaceNames();

        if(in_array(ExceptionIfRequestError::class, $interfaces)) {
            $this->exceptionIfRequestError();
        }

        if(in_array(WithHeaders::class, $interfaces)) {
            $this->withResponseHeaders();
        }

        if(in_array(TooManyRequestsTries::class, $interfaces)) {
            $this->tooManyRequestsTries();
        }

        if(in_array(MaxLimit::class, $interfaces)) {
            $this->limit(HubspotConfig::MAX_BATCH_LIMIT);
        }

        if(isset($this->properties)) {
            $this->properties(...$this->properties);
        }

        if(isset($this->propertiesWithHistory)) {
            $this->propertiesWithHistory(...$this->propertiesWithHistory);
        }

        if(isset($this->associations)) {
            $this->associations(...$this->associations);
        }
    }
}
