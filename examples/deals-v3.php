<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\DealHubspot;

$deals = DealHubspot::limit(100)->getAll();

//$deals = DealHubspot::propertiesWithHistory('dealstage')->getAll();

$deals->each(function ($deal) {
    dump($deal->id);
});


dump($deals->map(function ($item) {
    return (float) $item->properties->amount;
}));

dump($deals->reduce(function ($before, $item) {
    return $before + (float) $item->properties->amount;
}, 0));
