<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\AssociationHubspot;

dump(AssociationHubspot::getDefinition('contacts', 'deals'));
dump(AssociationHubspot::createDefinition('d', 'dsd', ['s' => 5]));
