<?php

namespace LTL\Hubspot\Core\Handlers;

use LTL\Hubspot\Core\Builder;
use LTL\Hubspot\Core\Handlers\HandlersProvider;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;

abstract class Handlers
{
    public static function call(Builder $builder, string $handlerName, array $arguments): ResourceInterface
    {
        $handlerClass = HandlersProvider::HANDLERS[$handlerName];

        return $handlerClass::handle($builder, ...$arguments);
    }
}
