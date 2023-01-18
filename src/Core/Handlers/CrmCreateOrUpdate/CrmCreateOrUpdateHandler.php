<?php

namespace LTL\Hubspot\Core\Handlers\CrmCreateOrUpdate;

use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;
use LTL\Hubspot\Core\Builder;
use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;
use LTL\Hubspot\Core\Resource\Resource;

abstract class CrmCreateOrUpdateHandler
{
    public static function handle(
        Builder $builder,
        BaseBodyBuilder|array $requestBody,
        int|string|null $hubspotId
    ): ResourceInterface {
        if (is_null($hubspotId)) {
            return $builder->create($requestBody);
        }

        return $builder->update($hubspotId, $requestBody);
    }
}