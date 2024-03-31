<?php

namespace LTL\Hubspot\Core\Request;

use LTL\Hubspot\Core\Request\Components\CurlRequestComponent;
use LTL\Hubspot\Core\Request\Components\HeaderRequestComponent;
use LTL\Hubspot\Core\Request\Components\QueryRequestComponent;
use LTL\Hubspot\Core\Request\Components\ResourceRequestComponent;
use LTL\Hubspot\Core\Request\Components\ResponseRequestComponent;

abstract class RequestComponentsList
{
    public const ALL = [
        'query' => QueryRequestComponent::class,
        'header' => HeaderRequestComponent::class,
        'curl' => CurlRequestComponent::class,
        'resourceRequest' => ResourceRequestComponent::class,
        'responseRequest' => ResponseRequestComponent::class
    ];
}
