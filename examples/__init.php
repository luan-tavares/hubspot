<?php


require_once __DIR__ .'/../vendor/autoload.php';

use LTL\Hubspot\Core\HubspotConfig;

define('ENV', envDefine(HubspotConfig::BASE_PATH .'/.env'));

hubspotKey(ENV['HUBSPOT_API_TROPICAL']);
