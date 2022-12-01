<?php

namespace LTL\Hubspot\Core\Handlers\ContactCreateOrUpdateByEmail;

use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;
use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;
use LTL\Hubspot\Resources\V3\ContactHubspot;

abstract class ContactCreateOrUpdateByEmailHandler
{
    public static function handle(
        ContactHubspot $resource,
        BaseBodyBuilder|array $requestBody
    ): ResourceInterface {
        $hubspotResponse = $resource->create($requestBody);
        $status = $hubspotResponse->status();

        if ($status === HubspotConfig::CONFLICT_ERROR_CODE) {
            $contactId = self::getIdFromErrorMessage($hubspotResponse);

            return $resource->update($contactId, $requestBody);
        }

        return $hubspotResponse;
    }

    private static function getIdFromErrorMessage(ContactHubspot $hubspotResponse): int
    {
        return preg_replace('/[^0-9]/', '', $hubspotResponse->message);
    }
}