<?php

namespace LTL\Hubspot\Core\Request\Interfaces;

use LTL\Hubspot\Core\Request\Interfaces\ComponentInterface;
use LTL\ListMethods\PublicMethods\Interfaces\PublicMethodsListableInterface;

interface ResponseRequestComponentInterface extends ComponentInterface, PublicMethodsListableInterface
{
    public function withObjectResponse(): self;
    public function notWithObjectResponse(): self;
    public function isErrorIfPropertyNotExists(): self;
    public function isNullIfPropertyNotExists(): self;
}
