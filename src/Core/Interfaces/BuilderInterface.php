<?php

namespace LTL\Hubspot\Core\Interfaces;

use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;

interface BuilderInterface
{
    public function resource(): ResourceInterface;
    public function __call($method, $arguments);
}
