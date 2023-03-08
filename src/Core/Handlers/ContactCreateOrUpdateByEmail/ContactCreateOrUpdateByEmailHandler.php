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
        if (is_null($idHubspot)) {
            $hubspotResponse = $builder->create($requestBody);
        } else {
            $hubspotResponse = $builder->update($idHubspot, $requestBody);
        }

        $status = $hubspotResponse->status();

        if ($status === HubspotConfig::NOT_FOUND_ERROR_CODE) {
            $hubspotResponse = $builder->create($requestBody);
            $status = $hubspotResponse->status();
        }

        if ($status === HubspotConfig::CONFLICT_ERROR_CODE) {
            $contactId = self::getIdFromErrorMessage($hubspotResponse);

            return $builder->update($contactId, $requestBody);
        }

        return $hubspotResponse;
    }

    private static function getIdFromErrorMessage(ContactHubspot $hubspotResponse): int
    {
        return preg_replace('/[^0-9]/', '', $hubspotResponse->message);
    }
}
