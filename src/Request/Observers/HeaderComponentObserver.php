<?php

namespace LTL\HubspotApi\Request\Observers;

use LTL\HubspotApi\Request\Components\RequestComponent;
use LTL\HubspotApi\Services\Observer\Observer;

class HeaderComponentObserver extends Observer
{
    protected function removeApikey(RequestComponent $subject): void
    {
        $subject->getRequest()->removeQuery('hapikey');
    }
}
