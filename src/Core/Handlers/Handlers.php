<?php

namespace LTL\Hubspot\Core\Handlers;

use LTL\Hubspot\Core\Handlers\CrmCreateOrUpdate\CrmCreateOrUpdateHandler;
use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;
use LTL\Hubspot\Core\Resource\Resource;

abstract class Handlers
{
    private const HANDLERS = [
        'create_or_update' => CrmCreateOrUpdateHandler::class
    ];

    public static function call(Resource $resource, string $handler, array $arguments): ResourceInterface
    {
        $handlerClass = self::HANDLERS[$handler];

        return $handlerClass::handle($resource, ...$arguments);
    }

    public static function getHandlerClass(string $handler): string
    {
        return self::HANDLERS[$handler];
    }
}