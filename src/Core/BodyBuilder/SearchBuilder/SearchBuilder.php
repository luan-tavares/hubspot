<?php

namespace LTL\Hubspot\Core\BodyBuilder\SearchBuilder;

use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;
use LTL\Hubspot\Core\BodyBuilder\SearchBuilder\SearchActionsBuilder;

/**
 * @method $this after(string|int $after) Add After to Search
 * @method static $this after(string|int $after) Add After to Search
 * @method $this limit(string|int $limit)
 * @method static $this limit(string|int $limit)
 * @method $this filterGroup(callable $function)
 * @method static $this filterGroup(callable $function)
 * @method $this filterEqual(string $property, string|int $value)
 * @method static $this filterEqual(string $property, string|int $value)
 * @method $this filterGreater(string $property, string|int $value)
 * @method static $this filterGreater(string $property, string|int $value)
 * @method $this filterLess(string $property, string|int $value)
 * @method static $this filterLess(string $property, string|int $value)
 * @method $this filterHas(string $property)
 * @method static $this filterHas(string $property)
 * @method $this properties(string ...$arguments)
 * @method static $this properties(string ...$arguments)
 * @method $this sortAsc(string $property)
 * @method static $this sortAsc(string $property)
 * @method $this sortDesc(string $property)
 * @method static $this sortDesc(string $property)
 */
class SearchBuilder extends BaseBodyBuilder
{
    protected string $actionsClass = SearchActionsBuilder::class;

    protected array $data = [
        'after' => 0,
        'limit' => 20,
        'properties' => [],
        'sorts' => [],
        'filterGroups' => [
            [
                'filters' => []
            ]
        ]
    ];
}