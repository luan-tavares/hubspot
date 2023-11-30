<?php

namespace LTL\Hubspot\Core\Handlers\ImportAll;

use LTL\Hubspot\Core\Builder;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;

abstract class ImportAllHandler
{
    public static function handle(
        Builder $builder,
        callable $fn
    ): ResourceInterface {
        $after = 0;

        while (true) {
            if ($after != 0) {
                $builder->after($after);
            }
            $resource = $builder->getAll();
           
            $after = $resource->after;
            
            $fn($resource);

            if (is_null($after)) {
                break;
            }
        }

        return $resource;
    }
}
