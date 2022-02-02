<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\ContactHubspot;

dd(
    ContactHubspot::byEmail()->get('luan.tavares.lourenco@gmail.com')
);
