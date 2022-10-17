<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\V3\ConversationHubspot;

 $messages = ConversationHubspot::oAuth(ENV['HUBSPOT_OAUTH'])
     ->limit(50)
     ->getAllMessages(3296393889);

 $actors = ConversationHubspot::getAllActors(['inputs' => ['A-24494761']]);

 //dd($messages->toArray());

$thread = ConversationHubspot::oAuth(ENV['HUBSPOT_OAUTH'])->sendMessage(3296393889, [
    'type' => 'MESSAGE',
    'text' => 'last one!',
    'senderActorId' => 'V-4350051',
    'channelId' => '1000',
    'channelAccountId' => '51129741',
    'subject' => 'title',
    'recipients' => [
        [
            'actorId' => 'E-luan@tropicalhub.co'
        ]
    ]
]);

dd($thread->toArray());