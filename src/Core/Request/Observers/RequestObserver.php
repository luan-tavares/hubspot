<?php

namespace LTL\Hubspot\Core\Request\Observers;

use LTL\Hubspot\Core\Request\Components\RequestComponent;
use LTL\Hubspot\Services\Observer\Observer;

class RequestObserver extends Observer
{
    protected function oAuthInserted(RequestComponent $subject): void
    {
        $subject->getRequest()->removeQuery('hapikey');
    }
    
    protected function removeOAuth(RequestComponent $subject): void
    {
        $subject->getRequest()->removeHeader('Authorization');
    }

    protected function bodyRemoved(RequestComponent $subject): void
    {
        $subject->getRequest()->removeHeader('Content-Type');
    }
}
