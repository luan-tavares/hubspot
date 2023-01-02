<?php

namespace LTL\Hubspot\Core\Request;

use LTL\Hubspot\Core\Request\Components\BodyRequestComponent;
use LTL\Hubspot\Core\Request\Components\CurlRequestComponent;
use LTL\Hubspot\Core\Request\Components\HeaderRequestComponent;
use LTL\Hubspot\Core\Request\Components\MethodRequestComponent;
use LTL\Hubspot\Core\Request\Components\QueryRequestComponent;
use LTL\Hubspot\Core\Request\Components\ResourceRequestComponent;
use LTL\Hubspot\Core\Request\Components\UriRequestComponent;

abstract class RequestComponentsList
{
    public const ALL = [
        'query' => QueryRequestComponent::class,
        'body' => BodyRequestComponent::class,
        'header' => HeaderRequestComponent::class,
        'curl' => CurlRequestComponent::class,
        'uri' => UriRequestComponent::class,
        'method' => MethodRequestComponent::class,
        'resourceRequest' => ResourceRequestComponent::class
    ];
}
