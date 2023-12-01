<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Concerns\WithRequestTries;
use LTL\Hubspot\Core\BodyBuilder\SearchBuilder\SearchBuilder;
use LTL\Hubspot\Resources\V3\ContactHubspot;

$a = new class extends ContactHubspot implements WithRequestTries {

};

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
], null));

$requestBody = SearchBuilder::filterEqual('hs_createdate', 5)
    ->sortDesc('hs_createdate')->sortDesc('hs_updated')
    ->after(20)->get();

$contacts = ContactHubspot::search($requestBody);
