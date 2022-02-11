<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Containers\ApikeyContainer;
use LTL\Hubspot\Resources\TimelineExtensionHubspot;

ApikeyContainer::store(ENV['HUBSPOT_API_DEVELOPER']);

$timeline = TimelineExtensionHubspot::get(197428, 391519);

dump($timeline);

$finalInsert = [
    'eventTemplateId' => '391519',
    'objectId'    => 96017601,
    'tokens' => [
        'mensagem'    => 'teste 123',
        'status'      => 'feito',
        'celular'     => '12',
        'Remetente'   => 'WORKFLOW 5',
    ],
];

$event = TimelineExtensionHubspot::oAuth('xxx');

dd($event->getEventHtmlDetail(391519, 'e33d57eb-6e63-42be-aa3f-f7f1e0323ccf'));
