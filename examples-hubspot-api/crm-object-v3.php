<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\V3\CrmObjectHubspot;

$after = 0;

while (true) {
    $objects =  CrmObjectHubspot::limit(50)
        ->properties('name')
        ->propertiesWithHistory('name')
        ->after($after)->getAll('p1858913_teste_extensao');

    foreach ($objects as $object) {
        dump($object);
    }
    $after = $objects->after;

    dump($after);

    if (is_null($after)) {
        break;
    }
}

$requestBody = SearchBuilder::filterHas('id')->properties('name', 10)->sortDesc('hs_createdate');

$objectSearch = CrmObjectHubspot::search('p1858913_teste_extensao', $requestBody);

$objectSearch->each(function ($item) {
    dump($item->id);
});
