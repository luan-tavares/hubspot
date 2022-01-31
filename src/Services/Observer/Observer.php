<?php

namespace LTL\Hubspot\Services\Observer;

use LTL\Hubspot\Services\Observer\Interfaces\ObserverInterface;
use LTL\Hubspot\Services\Observer\Interfaces\SubjectInterface;

class Observer implements ObserverInterface
{
    public function update(SubjectInterface $subject, string $event)
    {
        if (method_exists($this, $event)) {
            $this->{$event}($subject);
        }
    }
}
