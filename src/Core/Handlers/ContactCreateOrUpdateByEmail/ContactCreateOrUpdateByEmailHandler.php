<?php

namespace LTL\Hubspot\Core\Handlers\ContactCreateOrUpdateByEmail;

use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;
use LTL\Hubspot\Core\Builder;
use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;
use LTL\Hubspot\Resources\V3\ContactHubspot;

abstract class ContactCreateOrUpdateByEmailHandler
{
    public static function handle(
        Builder $builder,
        BaseBodyBuilder|array $requestBody,
        int|null|string $idHubspot = null
    ): ResourceInterface {
        $hubspotResponse = self::createOrUpdate($builder, $requestBody, $idHubspot);
        $status = $hubspotResponse->status();

        if ($status === HubspotConfig::NOT_FOUND_ERROR_CODE) {
            $idHubspot = null;
            $hubspotResponse = self::createOrUpdate($builder, $requestBody, $idHubspot);
            $status = $hubspotResponse->status();
        }

        if ($hubspotResponse->invalidEmailError()) {
            unset($requestBody['properties']['email']);
            $hubspotResponse = self::createOrUpdate($builder, $requestBody, $idHubspot);
            $status = $hubspotResponse->status();
        }

        if ($status === HubspotConfig::CONFLICT_ERROR_CODE) {
            $contactId = self::getIdFromErrorMessage($hubspotResponse);

            return $builder->update($contactId, $requestBody);
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

    private static function getIdFromErrorMessage(ContactHubspot $hubspotResponse): int
    {
        return preg_replace('/[^0-9]/', '', $hubspotResponse->message);
    }
}
