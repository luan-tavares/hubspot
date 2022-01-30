<?php

namespace LTL\HubspotApi\Request\Observers;

use LTL\HubspotApi\Request\Components\RequestComponent;
use LTL\HubspotApi\Services\Observer\Observer;

class BodyComponentObserver extends Observer
{
    protected function removeContentType(RequestComponent $subject): void
    {
        $subject->getRequest()->removeHeader('Content-Type');
    }
}
