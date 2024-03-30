<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Concerns\WithRequestException;
use LTL\Hubspot\Concerns\WithRequestTries;
use LTL\Hubspot\Core\BodyBuilder\SearchBuilder\SearchBuilder;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use LTL\HubspotRequestBody\Resources\HubspotCrmCreateBody;
use LTL\HubspotRequestBody\Resources\HubspotCrmUpdateBody;
use LTL\HubspotRequestBody\Resources\HubspotSearchBody;

dd(ContactHubspot::getAll());

$requestBody = HubspotSearchBody::filterContains('company', 'TOTVS')->sortDesc('hs_updated');


$contacts = ContactHubspot::search($requestBody);

dd($contacts, $requestBody);
