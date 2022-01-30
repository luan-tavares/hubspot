<?php

namespace LTL\HubspotApi\Request\Components;

use LTL\HubspotApi\Core\Schema;
use LTL\HubspotApi\Interfaces\ResourceInterface;
use LTL\HubspotApi\Request\Request;
use LTL\HubspotApi\Services\ArrayObject\ArrayObjectService;
use LTL\HubspotApi\Services\Observer\Interfaces\SubjectInterface;
use LTL\HubspotApi\Services\Observer\Traits\SubjectTrait;

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

    public function getMethodSchema(string $method): array
    {
        return $this->request->getMethodSchema($method);
    }

    public function getResource(): ResourceInterface
    {
        return $this->request->getResource();
    }
}
