<?php

namespace LTL\Hubspot\Core\Schema\ActionProperties;

use LTL\Hubspot\Core\Interfaces\Schemas\ResourceSchemaInterface;

abstract class ActionProperty
{
    protected mixed $value = null;

    public function __construct(object $actionSchema, ResourceSchemaInterface|null $schema = null)
    {
        $this->value = $this->parse($actionSchema, $schema);
    }

    protected function parse(object $actionSchema, ResourceSchemaInterface|null $schema): mixed
    {
        /**Parse */
    }

    public function get(): mixed
    {
        return $this->value;
    }
}
