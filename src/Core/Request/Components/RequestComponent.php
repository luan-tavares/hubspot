<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Core\Schema;
use LTL\Hubspot\Core\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Request\Request;
use LTL\Hubspot\Services\ArrayObject\ArrayObjectService;
use LTL\Hubspot\Services\Observer\Interfaces\SubjectInterface;
use LTL\Hubspot\Services\Observer\Traits\SubjectTrait;

abstract class RequestComponent extends ArrayObjectService implements SubjectInterface
{
    use SubjectTrait;

    public function __construct(private Request $request, array $array = [])
    {
        parent::__construct($array);
    }

    public function getRequest(): Request
    {
        return $this->request;
    }

    public function getSchema(): Schema
    {
        return $this->request->getSchema();
    }

    public function getActionSchema(string $method): array
    {
        return $this->request->getActionSchema($method);
    }

    public function getResource(): ResourceInterface
    {
        return $this->request->getResource();
    }
}
