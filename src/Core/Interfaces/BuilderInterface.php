<?php

namespace LTL\Hubspot\Core\Interfaces;

use LTL\Hubspot\Core\Interfaces\Request\RequestInterface;
use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;

interface BuilderInterface
{
    public function __call($method, $arguments);
    public function baseResource(): ResourceInterface;
    public function request(): RequestInterface;
}
