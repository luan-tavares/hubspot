<?php

use LTL\Hubspot\Core\BodyBuilder\SearchBuilder\SearchBuilder;

require_once __DIR__ .'/__init.php';

dd(
    SearchBuilder::after(10)->properties('a', 'b', 'c')
        ->whereGroup(function (SearchBuilder $builder) {
            $builder->where('ccc', 10);
            $builder->whereHas('last');
        })
        ->sort('hs_createdate')->sort('hs_updated')
        ->after(20)->get()
);
