<?php

namespace LTL\Hubspot\Core\Handlers\CrmCreateOrUpdate;

use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;
use LTL\Hubspot\Core\Builder;
use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;
use LTL\Hubspot\Core\Resource\Resource;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Hubspot;

abstract class CrmCreateOrUpdateHandler
{
    public static function handle(
        Builder $builder,
        BaseBodyBuilder|array $requestBody,
        int|null|string $idHubspot = null
    ): ResourceInterface {
        $hasException = $builder->request()->hasExceptionIfRequestError();
        $builder->exceptionIfRequestError(false);

        $hubspotResponse = self::createOrUpdate($builder, $requestBody, $idHubspot);
        $status = $hubspotResponse->status();

        if ($status === HubspotConfig::NOT_FOUND_ERROR_CODE) {
            $idHubspot = null;
            $hubspotResponse = self::createOrUpdate($builder, $requestBody, $idHubspot);
            $status = $hubspotResponse->status();
        }

        if ($status === HubspotConfig::CONFLICT_ERROR_CODE) {
            $contactId = self::getIdFromErrorMessage($hubspotResponse);

            return $builder->update($contactId, $requestBody);
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

    private static function getIdFromErrorMessage(Hubspot $hubspotResponse): int
    {
        preg_match_all('/\d+/', $hubspotResponse->message, $matches);
        $matches = current($matches);

        return array_pop($matches);
    }
}