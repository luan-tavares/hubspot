<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\CrmObjectHubspot;
use LTL\Hubspot\Resources\PipelineHubspot;

$after = 0;

while (true) {
    $properties =  CrmObjectHubspot::limit(100)->after($after)->getAll('companies');
    foreach ($properties as $company) {
        dump($company->properties);
    }
    $after = $properties->responseOffset();

    dump($after, count($properties));

    if (is_null($after)) {
        break;
    }
}
