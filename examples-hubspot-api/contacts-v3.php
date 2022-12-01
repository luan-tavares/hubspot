<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Core\BodyBuilder\SearchBuilder\SearchBuilder;
use LTL\Hubspot\Resources\ContactHubspot;

dd(
    ContactHubspot::createOrUpdateByEmail([
        'properties' => [
            'email' => 'mock@ipsum.com',
            'firstname' => 'Jeje'
        ]
    ])
);

ContactHubspot::importAll(function (ContactHubspot $hubspotResource) {
    dump($hubspotResource->count());
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