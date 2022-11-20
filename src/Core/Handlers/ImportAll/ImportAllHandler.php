<?php

namespace LTL\Hubspot\Core\Handlers\ImportAll;

use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;
use LTL\Hubspot\Core\Resource\Resource;

abstract class ImportAllHandler
{
    public static function handle(
        Resource $resource,
        callable $fn,
        int $chunk
    ): ResourceInterface {
        $after = 0;

        while (true) {
            $hubspotRequest = $resource->limit($chunk)->after($after)->getAll();
            $after = $hubspotRequest->after;

            $fn($hubspotRequest);

            if (is_null($after)) {
                break;
            }
        }

        return $resource;
    }
}