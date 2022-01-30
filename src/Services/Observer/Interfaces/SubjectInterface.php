<?php

namespace LTL\HubspotApi\Services\Observer\Interfaces;

use LTL\HubspotApi\Services\Observer\Interfaces\ObserverInterface;

interface SubjectInterface
{
    public function attach(ObserverInterface $observer);
    public function detach(ObserverInterface $observer);
    public function notify(string $event);
}
