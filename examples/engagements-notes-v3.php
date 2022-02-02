<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\CrmSchemaHubspot;
use LTL\Hubspot\Resources\EngagementV1Hubspot;
use LTL\Hubspot\Resources\NoteHubspot;

dd(
    //NoteHubspot::properties('hs_note_body')->getAll()->toArray(),
    NoteHubspot::properties('hs_note_body,attachments')->associations('deals')->get(19004034222)->toArray(),
    //EngagementV1Hubspot::get(19004034222)->toArray()
   // NoteHubspot::getAssociations(19004034222, 'files')
);
