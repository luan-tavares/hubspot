<?php

namespace LTL\Hubspot\Core\Handlers\CrmCreateOrUpdate;

use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;
use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;
use LTL\Hubspot\Core\Resource\Resource;

abstract class CrmCreateOrUpdateHandler
{
    public static function handle(
        Resource $resource,
        BaseBodyBuilder|array $requestBody,
        int|string|null $hubspotId
    ): ResourceInterface {
        if (is_null($hubspotId)) {
            return $resource->create($requestBody);
        }

        return $resource->update($hubspotId, $requestBody);
    }
}