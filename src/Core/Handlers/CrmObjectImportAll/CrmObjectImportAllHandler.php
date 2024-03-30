<?php

namespace LTL\Hubspot\Core\Handlers\CrmObjectImportAll;

use LTL\Hubspot\Core\Builder;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;

abstract class CrmObjectImportAllHandler
{
    public static function handle(
        Builder $builder,
        string $objectType,
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
            $resourceHubspot = $builder->getAll($objectType);
           
            $after = $resourceHubspot->getAfter();
            
            $fn($resourceHubspot);

            if (is_null($after)) {
                break;
            }
        }

        return $resourceHubspot;
    }
}
