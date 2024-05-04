<?php

use LTL\Hubspot\Resources\V4\AssociationHubspot;

require_once __DIR__ .'/__init.php';

/*
dd(AssociationHubspot::updateDefinition('contacts', 'companies', [
    'inverseLabel' => 'stringssssa',
    'associationTypeId' => 269,
    'label' => 'strsing'
]));
*/
AssociationHubspot::limit(2)->importAll('0-3', '18874983803', '0-8', function (AssociationHubspot $resource) {
    
    dd($resource->empty());
});
