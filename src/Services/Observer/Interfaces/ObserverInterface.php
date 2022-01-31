<?php

namespace LTL\Hubspot\Services\Observer\Interfaces;

use LTL\Hubspot\Services\Observer\Interfaces\SubjectInterface;

interface ObserverInterface
{
    public function update(SubjectInterface $subject, string $event);
}
