<?php

namespace LTL\Hubspot\Core;

use LTL\Hubspot\Core\Request\Interfaces\RequestInterface;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;

interface BuilderInterface
{
    public function __call($method, $arguments);
    public function baseResource(): ResourceInterface;
    public function request(): RequestInterface;
}
