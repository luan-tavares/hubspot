<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\CrmObjectHubspot;

$after = 0;

// while (true) {
//     $objects =  CrmObjectHubspot::limit(50)
//         ->properties('name')
//         ->propertiesWithHistory('name')
//         ->after($after)->getAll('p1858913_teste_extensao');

//     foreach ($objects as $object) {
//         dump($object);
//     }
//     $after = $objects->after;

//     dump($after);

//     if (is_null($after)) {
//         break;
//     }
// }

$objectsSearch = CrmObjectHubspot::search('p1858913_teste_extensao', [
    'filterGroups' => [
        [
            'filters' => [
                [
                    //'value' => 'id',
                    'propertyName' => 'id',
                    'operator' => 'HAS_PROPERTY'
                ]
            ]
        ]
    ],
    'sorts' => [
        [
            'propertyName' => 'hs_createdate',
            'direction' => 'DESCENDING'
        ]
    ],
    'properties' => [
        'name'
    ],
    'limit' => 10,
    'after' => 0
]);

dd($objectsSearch->toArray());
