<?php

namespace LTL\Hubspot;

use LTL\Hubspot\Concerns\WithEnrollUpdateList;
use LTL\Hubspot\Concerns\WithHeaders;
use LTL\Hubspot\Concerns\WithListFilters;
use LTL\Hubspot\Concerns\WithMaxLimit;
use LTL\Hubspot\Concerns\WithRequestException;
use LTL\Hubspot\Concerns\WithRequestTries;
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
        $interfaces = (new ReflectionClass($this))->getInterfaceNames();

        if(in_array(WithRequestException::class, $interfaces)) {
            $this->withRequestException();
        }

        if(in_array(WithHeaders::class, $interfaces)) {
            $this->withHeaders();
        }

        if(in_array(WithRequestTries::class, $interfaces)) {
            $this->withRequestTries();
        }

        if(in_array(WithMaxLimit::class, $interfaces)) {
            $this->maxLimit();
        }

        if(in_array(WithListFilters::class, $interfaces)) {
            $this->withListFilters();
        }

        if(in_array(WithEnrollUpdateList::class, $interfaces)) {
            $this->enrollObjectsUpdateList();
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

        $this->init();
    }

    protected function init()
    {
    }
}
