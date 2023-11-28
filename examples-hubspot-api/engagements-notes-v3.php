<?php

use LTL\Hubspot\Resources\V3\EngagementNoteHubspot;

require_once __DIR__ .'/__init.php';


$dealId = 8635866769;

define('NOTE_TO_DEAL_DEFINITION_ID', 214);

$attachments = [
    5479161543
];

dd(
    EngagementNoteHubspot::associations('deals')->get(19004034222)->toArray(),
);

dd(
    EngagementNoteHubspot::createAssociation(
        19004034222,
        'deal',
        $dealId,
        NOTE_TO_DEAL_DEFINITION_ID
    ),
    EngagementNoteHubspot::update(19004034222, [
        'properties' => [
            'hs_attachment_ids' => implode(';', $attachments),
        ]
    ])->toArray(),
    EngagementNoteHubspot::propertiesWithHistory('hs_note_body,hs_attachment_ids')->get(19004034222)->toArray(),
);
