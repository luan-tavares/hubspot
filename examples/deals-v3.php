<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\DealHubspot;

$hubspot = DealHubspot::limit(100)->getAll();

$deal = DealHubspot::get(7796009271)->toArray();

dd(json_encode($deal));

dump($hubspot->map(function ($item) {
    return (float) $item->properties->amount;
}));

dump($hubspot->reduce(function ($before, $item) {
    return $before + (float) $item->properties->amount;
}, 0));
