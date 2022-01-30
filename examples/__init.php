<?php

require_once __DIR__ .'/../vendor/autoload.php';

define('ENV', envDefine(__ROOT__ .'/.env'));

hubspotKey(ENV['HUBSPOT_API_TEST']);
