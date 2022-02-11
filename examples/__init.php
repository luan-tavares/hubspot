<?php


require_once __DIR__ .'/../vendor/autoload.php';

use LTL\Hubspot\Containers\ApikeyContainer;
use LTL\Hubspot\Core\HubspotConfig;

define('ENV', envDefine(HubspotConfig::BASE_PATH .'/.env'));

ApikeyContainer::store(ENV['HUBSPOT_API']);
