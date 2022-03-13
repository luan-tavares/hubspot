<?php


require_once __DIR__ .'/__init.php';


use LTL\Hubspot\Resources\PropertyHubspot;

dd(PropertyHubspot::getAll('deals')->map(function ($item) {
    return $item->label;
}));
