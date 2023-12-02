<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Concerns\WithRequestException;
use LTL\Hubspot\Concerns\WithRequestTries;
use LTL\Hubspot\Core\BodyBuilder\SearchBuilder\SearchBuilder;
use LTL\Hubspot\Resources\V3\ContactHubspot;
use LTL\HubspotRequestBody\Resources\HubspotCrmCreateBody;
use LTL\HubspotRequestBody\Resources\HubspotCrmUpdateBody;
use LTL\HubspotRequestBody\Resources\HubspotSearchBody;

ContactHubspot::importAll(function (ContactHubspot $resource) {
    dd($resource);
});

/*$a = new class extends ContactHubspot implements WithRequestTries, WithRequestException {

};

$re = HubspotCrmCreateBody::properties(['a' => 1]);

$a->create($re);

$response = ContactHubspot::withRequestException()->createOrUpdateByEmail([
    'properties' => [
        'email' => 'luan.tavares.lourenco@gmail'
    ]
]);

dd($response);

ContactHubspot::after('5199902')->importAll(function (ContactHubspot $hubspotResource) {
    dump($hubspotResource->after);
}, 50);

dd(ContactHubspot::limit(10)->createOrUpdate([
    'properties' => [
        'firstname' => 'Teste',
        'email' => 'teste@teste.co'
    ]
], null));*/

$requestBody = HubspotSearchBody::filterContains('company', 'TOTVS')->sortDesc('hs_updated');


$contacts = ContactHubspot::search($requestBody);

dd($contacts, $requestBody);
