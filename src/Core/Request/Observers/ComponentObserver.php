<?php

namespace LTL\Hubspot\Core\Request\Observers;

use LTL\Hubspot\Core\Interfaces\Request\ComponentInterface;
use LTL\Observer\Observer;

class ComponentObserver extends Observer
{
    protected function oAuthInserted(ComponentInterface $subject): void
    {
        $subject->request()->removeApikey();
    }

    protected function apikeyInserted(ComponentInterface $subject): void
    {
        $subject->request()->removeOAuth();
    }
}
