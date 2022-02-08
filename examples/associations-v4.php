<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\AssociationHubspot;

// dd(
//     AssociationHubspot::deleteDefinition(
//         '2-4031056',
//         'deals',
//         181
//     ),
//     AssociationHubspot::updateDefinition(
//         'deals',
//         '2-4031056',
//         [
//             'label' => 'teste_adm_to_deal',
//             'associationTypeId' => 158
//         ]
//     )
// );

// dump(AssociationHubspot::getDefinition('contacts', 'deals'));
dump(AssociationHubspot::createDefinition('d', 'dsd', ['s' => 5]));
