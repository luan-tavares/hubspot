<?php

namespace LTL\HubspotApi\Services\Observer\Interfaces;

use LTL\HubspotApi\Services\Observer\Interfaces\SubjectInterface;

interface ObserverInterface
{
    public function update(SubjectInterface $subject, string $event);
}
