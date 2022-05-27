<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\V3\PipelineHubspot;

dd(
    PipelineHubspot::getStage('deals', 'default', 525490),
    PipelineHubspot::getAll('deals')->map(function ($pipeline) {
        return $pipeline->label;
    })
);
