<?php

namespace LTL\HubspotApi\Services\Observer;

use LTL\HubspotApi\Services\Observer\Interfaces\ObserverInterface;
use LTL\HubspotApi\Services\Observer\Interfaces\SubjectInterface;

class Observer implements ObserverInterface
{
    public function update(SubjectInterface $subject, string $event)
    {
        if (method_exists($this, $event)) {
            $this->{$event}($subject);
        }
    }
}
