<?php



require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Concerns\WithMaxLimit;
use LTL\Hubspot\Concerns\WithRequestException;
use LTL\Hubspot\Concerns\WithRequestTries;
use LTL\Hubspot\Resources\V3\DealHubspot;

class Deal extends DealHubspot implements WithRequestException, WithRequestTries, WithMaxLimit
{
}

Deal::importAll(function (DealHubspot $resource) {
    dump($resource);
});
