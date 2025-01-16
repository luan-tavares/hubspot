<?php

namespace LTL\Hubspot\Core\Handlers\ContactCreateOrUpdateByEmail;

use LTL\Hubspot\Core\Builder;
use LTL\Hubspot\Core\Helpers\GetIdFromErrorMessageHelper;
use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\HubspotRequestBody\Resources\HubspotCrmUpdateBody;

abstract class ContactCreateOrUpdateByEmailHandler
{
    public static function handle(
        Builder $builder,
        HubspotCrmUpdateBody|array $requestBody,
        int|null|string $idHubspot = null
    ): ResourceInterface {
        $request = $builder->request();
        /** */
        $hasException = $request->hasWithRequestException();

        $request->removeException();

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
            $contactId = GetIdFromErrorMessageHelper::handle($hubspotResponse);

            return $builder->update($contactId, $requestBody);
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
