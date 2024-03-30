<?php

use LTL\Hubspot\Resources\V4\AssociationHubspot;

require_once __DIR__ .'/__init.php';

dd(AssociationHubspot::updateDefinition('contacts', 'companies', [
    'inverseLabel' => 'stringssssa',
    'associationTypeId' => 269,
    'label' => 'strsing'
]));

AssociationHubspot::importAll('0-2', '19435281054', '0-1', function (AssociationHubspot $resource) {
    dd($resource);
    foreach ($resource as $associationObject) {
        dd($associationObject);
    }
});


dump(AssociationHubspot::createDefinition('d', 'dsd', ['s' => 5]));
