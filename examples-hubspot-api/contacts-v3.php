<?php


require_once __DIR__ . '/__init.php';

use LTL\Hubspot\Concerns\WithRequestException;
use LTL\Hubspot\Concerns\WithRequestTries;
use LTL\Hubspot\Core\BodyBuilder\SearchBuilder\SearchBuilder;
use LTL\Hubspot\Core\Globals\OAuthGlobal;
use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use LTL\HubspotRequestBody\Resources\HubspotCrmCreateBody;
use LTL\HubspotRequestBody\Resources\HubspotCrmUpdateBody;
use LTL\HubspotRequestBody\Resources\HubspotSearchBody;

$array = [
    "properties" => [
        "firstname" => "Apaza",
        "lastname" => "Miguel",
        "email" => "tristelobito3@gmail.com",
        "phone" => "+5511920121175",
        "pagaleve_id" => "98a46d88-12f9-4752-9131-54f2001f83d8",
        "document" => "90108374831",
        "pagaleve_status" => "PENDING",
        "address" => "Rua Embiruçu",
        "address_number" => "221",
        "city" => "São Paulo",
        "state" => "SP",
        "zip" => "03644000",
        "address_complement" => "Casa 15",
        "country" => "BR",
        "pagaleve_is_retro" => true,
    ],
];

$id = null;

$oAuth2 = ENV['OAUTH_P'];

dd(ContactHubspot::oAuth($oAuth2)->createOrUpdateByEmail($array, $id));

dd(ContactHubspot::getAll());

$requestBody = HubspotSearchBody::filterContains('company', 'TOTVS')->sortDesc('hs_updated');


$contacts = ContactHubspot::search($requestBody);

dd($contacts, $requestBody);
