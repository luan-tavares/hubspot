<?php

namespace LTL\Hubspot\Core\Handlers\AssociationImportAll;

use Closure;
use LTL\Hubspot\Core\Builder;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Resources\V4\AssociationHubspot;

abstract class AssociationImportAllHandler
{
    /**
     * @param Closure(AssociationHubspot $resource): void  $fn
     */
    public static function handle(
        Builder $builder,
        int|string $fromObjectType,
        int|string $fromObjectId,
        int|string $toObjectType,
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
            $resourceHubspot = $builder->getAll($fromObjectType, $fromObjectId, $toObjectType);
           
            $after = $resourceHubspot->getAfter();
            
            $fn($resourceHubspot);

            if (is_null($after)) {
                break;
            }
        }

        return $resourceHubspot;
    }
}
