<?php

namespace LTL\Hubspot\Core\Handlers\CrmCreateOrUpdate;

use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;
use LTL\Hubspot\Core\Builder;
use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Hubspot;

abstract class CrmCreateOrUpdateHandler
{
    public static function handle(
        Builder $builder,
        BaseBodyBuilder|array $requestBody,
        int|null|string $idHubspot = null
    ): ResourceInterface {
        
        $request = $builder->request();
        $hasException = $request->hasExceptionIfRequestError();
        $request->removeException();

        $hubspotResponse = self::createOrUpdate($builder, $requestBody, $idHubspot);
        $status = $hubspotResponse->status();

        if ($status === HubspotConfig::NOT_FOUND_ERROR_CODE) {
            $idHubspot = null;
            $hubspotResponse = self::createOrUpdate($builder, $requestBody, $idHubspot);
            $status = $hubspotResponse->status();
        }

        if ($hubspotResponse->error()) {
            $idHubspot = self::getIdFromErrorMessage($hubspotResponse);

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
        BaseBodyBuilder|array $requestBody,
        int|null|string $idHubspot = null
    ): ResourceInterface {
        if (is_null($idHubspot)) {
            return $builder->create($requestBody);
        }

        return $builder->update($idHubspot, $requestBody);
    }

    private static function getIdFromErrorMessage(Hubspot $hubspotResponse): int|null
    {
        if(is_null($message = $hubspotResponse->message)) {
            return null;
        }

        preg_match('/\d+/', $message, $matches);

        if(empty($matches)) {
            return null;
        }

        return current($matches);
    }
}
