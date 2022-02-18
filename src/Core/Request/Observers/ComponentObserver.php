<?php

namespace LTL\Hubspot\Core\Request\Observers;

use LTL\Hubspot\Core\Request\Components\RequestComponent;
use LTL\Observer\Observer;

class ComponentObserver extends Observer
{
    protected function oAuthInserted(RequestComponent $subject): void
    {
        $subject->getRequest()->removeQuery('hapikey');
    }
}
