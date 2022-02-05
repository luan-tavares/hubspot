<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\CrmObjectHubspot;

$after = 0;

while (true) {
    $properties =  CrmObjectHubspot::limit(100)->after($after)->getAll('p1858913_teste_extensao');
    foreach ($properties as $company) {
        dump($company->properties);
    }
    $after = $properties->after;

    dump($after);

    if (is_null($after)) {
        break;
    }
}
