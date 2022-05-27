<?php

namespace LTL\Hubspot\Core\Schema\ActionProperties;

abstract class ActionProperty
{
    protected mixed $value = null;

    public function __construct(object $actionSchema)
    {
        $this->value = $this->parse($actionSchema);
    }

    protected function parse(object $actionSchema): mixed
    {
        return null;
    }

    public function get(): mixed
    {
        return $this->value;
    }
}
