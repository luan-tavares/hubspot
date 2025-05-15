<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Core\Request\Interfaces\ResponseRequestComponentInterface;
use LTL\ListMethods\PublicMethods\Traits\PublicMethodsListable;

class ResponseRequestComponent extends AbstractRequestComponent implements ResponseRequestComponentInterface
{
    use PublicMethodsListable;

    protected function register(): void
    {
        $this->notWithObjectResponse();
        $this->isErrorIfPropertyNotExists();
    }

    public function withObjectResponse(): self
    {
        return $this->addNotNull('hasObject', true);
    }

    public function notWithObjectResponse(): self
    {
        return $this->addNotNull('hasObject', false);
    }

    public function isErrorIfPropertyNotExists(): self
    {
        return $this->addNotNull('errorIfPropertyExists', true);
    }

    public function isNullIfPropertyNotExists(): self
    {
        return $this->addNotNull('errorIfPropertyExists', false);
    }
}
