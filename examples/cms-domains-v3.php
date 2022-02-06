<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\CmsDomainHubspot;

CmsDomainHubspot::getAll()->each(function ($domain) {
    dump($domain->domain);
});

dd(CmsDomainHubspot::get(45562373510)->toArray());
