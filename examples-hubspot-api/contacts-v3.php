<?php


require_once __DIR__ .'/__init.php';

use LTL\Hubspot\Resources\ContactHubspot;

$after = $i = $memory = 0;
while (true) {
    $resources = ContactHubspot::limit(100)->after($after)->getAll();
    
    dump($resources->map(function ($resource) use (&$i) {
        $i++;

        return "{$i} - {$resource->id} - {$resource->properties->firstname}";
    }));
   
    $after = $resources->after;

    dump(memory_get_peak_usage(), memory_get_peak_usage() - $memory, $after);
    $memory = memory_get_peak_usage();

    if (!$after) {
        break;
    }
}


exit();

$hubspotCreate = ContactHubspot::withHeaders()->create(['properties' => ['firstname' => 1]]);

if ($hubspotCreate->error()) {
    dd($hubspotCreate->toArray());
}
$id = $hubspotCreate->id;
$hubspotDelete = ContactHubspot::withHeaders()->delete($id);

ContactHubspot::search([
    'filterGroups' => [
        [
            'filters' => [
                [
                    'value' => 'Luan',
                    'propertyName' => 'firstname',
                    'operator' => 'EQ'
                ]
            ]
        ]
    ],
    'limit' => 20,
    'after' => 0
])->each(function ($contact) {
    dump($contact);
});

//dd($hubspotCreate->headers(), $hubspotDelete->headers());


$hubspot = ContactHubspot::limit(10)->getAll();

dump($hubspot->map(function ($item) {
    return $item->properties->lastname;
}));

dump($hubspot->mapWithKeys(function ($item) {
    return [$item->id => $item->properties->firstname .' '. $item->properties->lastname];
}));

dd($hubspot->filter(function ($item) {
    return $item->properties->lastname === 'Mattos';
}));
