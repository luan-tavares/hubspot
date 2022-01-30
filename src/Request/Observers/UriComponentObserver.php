<?php

namespace LTL\HubspotApi\Request\Observers;

use LTL\HubspotApi\Request\Components\RequestComponent;
use LTL\HubspotApi\Services\Observer\Observer;

class UriComponentObserver extends Observer
{
    protected function removeOAuth(RequestComponent $subject): void
    {
        $subject->getRequest()->removeHeader('Authorization');
    }
}
