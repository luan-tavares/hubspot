<?php

namespace LTL\Hubspot\Core\Handlers;

use LTL\Hubspot\Core\Handlers\HandlersProvider;
use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;
use LTL\Hubspot\Core\Resource\Resource;

abstract class Handlers
{
    public static function call(Resource $resource, string $handlerName, array $arguments): ResourceInterface
    {
        $handlerClass = HandlersProvider::HANDLERS[$handlerName];

        return $handlerClass::handle($resource, ...$arguments);
    }
}