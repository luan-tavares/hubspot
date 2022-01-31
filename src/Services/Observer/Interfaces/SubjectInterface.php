<?php

namespace LTL\Hubspot\Services\Observer\Interfaces;

use LTL\Hubspot\Services\Observer\Interfaces\ObserverInterface;

interface SubjectInterface
{
    public function attach(ObserverInterface $observer);
    public function detach(ObserverInterface $observer);
    public function notify(string $event);
}
