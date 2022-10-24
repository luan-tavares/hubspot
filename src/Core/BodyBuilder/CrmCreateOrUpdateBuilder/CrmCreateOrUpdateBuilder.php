<?php

namespace LTL\Hubspot\Core\BodyBuilder\CrmCreateOrUpdateBuilder;

use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;
use LTL\Hubspot\Core\BodyBuilder\CrmCreateOrUpdateBuilder\CrmCreateOrUpdateActionsBuilder;

/**
 * @method $this properties(string|int $properties) Add After to Search
 * @method static $this properties(string|int $properties) Add After to Search
 */
class CrmCreateOrUpdateBuilder extends BaseBodyBuilder
{
    protected string $actionsClass = CrmCreateOrUpdateActionsBuilder::class;

    protected array $data = [
        'properties' => []
    ];
}