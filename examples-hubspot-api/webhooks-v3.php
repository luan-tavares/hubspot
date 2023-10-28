<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Core\Globals\ApikeyGlobal;
use LTL\Hubspot\Resources\V3\WebhookHubspot;

ApikeyGlobal::store(ENV['HUBSPOT_API_DEVELOPER']);

dd(WebhookHubspot::create(710030, [
    'active' => true,
    'eventType' => '2-3308615.propertyChange',
    'propertyName' => 'teste'
]));
