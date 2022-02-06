<?php

namespace LTL\Hubspot\Core\Request\Interfaces;

use LTL\Hubspot\Core\Request\Components\RequestComponent;
use LTL\Hubspot\Core\Request\Interfaces\RequestInterface;
use LTL\Hubspot\Services\ArrayObject\Interfaces\DeleteArrayInterface;
use LTL\Hubspot\Services\ArrayObject\Interfaces\GetArrayInterface;

interface ComponentInterface extends DeleteArrayInterface, GetArrayInterface
{
    public function add(string $name, string|int|array|null $value): RequestComponent;
    public function addAll(array|null $array): RequestComponent;
    public function getRequest(): RequestInterface;
}
