<?php

namespace LTL\Hubspot\Core\Handlers\ImportAll;

use Closure;
use LTL\Hubspot\Core\Builder;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;

abstract class ImportAllHandler
{
    /**
     * @param Closure(ResourceInterface $resourceHubspot): void $fn
     */
    public static function handle(
        Builder $builder,
        callable $fn
    ): ResourceInterface {
        $after = 0;

        while (true) {
            if ($after != 0) {
                $builder->after($after);
            }

            /**
             * @var ResourceInterface $resourceHubspot
             */
            $resourceHubspot = $builder->getAll();
           
            $after = $resourceHubspot->getAfter();
            
            $fn($resourceHubspot);

            if (is_null($after)) {
                break;
            }
        }

        return $resourceHubspot;
    }
}
