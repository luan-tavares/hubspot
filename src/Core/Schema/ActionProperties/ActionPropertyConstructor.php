<?php

namespace LTL\Hubspot\Core\Schema\ActionProperties;

use LTL\Hubspot\Core\Interfaces\Schemas\ResourceSchemaInterface;
use LTL\Hubspot\Core\Schema\ActionProperties\ActionProperty;

class ActionPropertyConstructor
{
    protected mixed $value = null;

    public function __construct(private object $actionSchema, private ResourceSchemaInterface $schema)
    {
    }

    public function build(string $actionPropertyClass): ActionProperty
    {
        return new $actionPropertyClass($this->actionSchema, $this->schema);
    }
}
