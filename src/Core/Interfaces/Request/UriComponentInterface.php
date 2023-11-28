<?php

namespace LTL\Hubspot\Core\Interfaces\Request;

use LTL\Hubspot\Core\Interfaces\Request\ComponentInterface;
use LTL\Hubspot\Core\Interfaces\Schemas\ActionSchemaInterface;
use LTL\Hubspot\Core\Request\RequestArguments;

interface UriComponentInterface extends ComponentInterface
{
    public function create(RequestArguments $requestArguments, ActionSchemaInterface $actionSchema): void;
    public function get(): string;
}
