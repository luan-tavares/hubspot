<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\SiteSearchHubspot;

dump(SiteSearchHubspot::query('q', 'hubspot')->limit(2)->search()->toArray());
