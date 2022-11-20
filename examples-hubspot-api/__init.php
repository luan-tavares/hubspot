<?php


require_once __DIR__ .'/../vendor/autoload.php';

use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Hubspot;

define('ENV', hubspotEnv(HubspotConfig::BASE_PATH .'/.env'));

Hubspot::setGlobalApikey(ENV['HUBSPOT_API']);