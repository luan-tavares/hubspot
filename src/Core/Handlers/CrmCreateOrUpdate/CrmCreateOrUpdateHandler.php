<?php

namespace LTL\Hubspot\Core\Handlers\CrmCreateOrUpdate;

use LTL\Hubspot\Core\Builder;
use LTL\Hubspot\Core\Helpers\GetIdFromErrorMessageHelper;
use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\HubspotRequestBody\Resources\HubspotCrmUpdateBody;

abstract class CrmCreateOrUpdateHandler
{
    public static function handle(
        Builder $builder,
        HubspotCrmUpdateBody|array $requestBody,
        int|null|string $idHubspot = null
    ): ResourceInterface {
        
        $request = $builder->request();
        $hasException = $request->hasWithRequestException();
        $request->removeException();

        $hubspotResponse = self::createOrUpdate($builder, $requestBody, $idHubspot);
        $status = $hubspotResponse->status();

        if ($status === HubspotConfig::NOT_FOUND_ERROR_CODE) {
            $idHubspot = null;
            $hubspotResponse = self::createOrUpdate($builder, $requestBody, $idHubspot);
            $status = $hubspotResponse->status();
        }

        if ($hubspotResponse->error()) {
            $idHubspot = GetIdFromErrorMessageHelper::handle($hubspotResponse);

            $hubspotResponse = self::createOrUpdate($builder, $requestBody, $idHubspot);
        }

        if ($hubspotResponse->error()) {
            $hubspotResponse = self::createOrUpdate($builder, $requestBody);
        }

        if ($hasException && $hubspotResponse->error()) {
            throw new HubspotApiException($hubspotResponse->toJson());
        }

        return $hubspotResponse;
    }

    private static function createOrUpdate(
        Builder $builder,
        HubspotCrmUpdateBody|array $requestBody,
        int|null|string $idHubspot = null
    ): ResourceInterface {
        if (is_null($idHubspot)) {
            return $builder->create($requestBody);
        }

        return $builder->update($idHubspot, $requestBody);
    }
}
