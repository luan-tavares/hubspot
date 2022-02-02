<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Core\Container;
use LTL\Hubspot\Core\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Request\Interfaces\RequestInterface;
use LTL\Hubspot\Core\Schemas\Interfaces\ActionSchemaInterface;
use LTL\Hubspot\Core\Schemas\Interfaces\ResourceSchemaInterface;
use LTL\Hubspot\Services\ArrayObject\ArrayObjectService;
use LTL\Hubspot\Services\Observer\Interfaces\SubjectInterface;
use LTL\Hubspot\Services\Observer\Traits\SubjectTrait;

abstract class RequestComponent extends ArrayObjectService implements SubjectInterface
{
    use SubjectTrait;

    public function __construct(private RequestInterface $request, array $array = [])
    {
        parent::__construct($array);

        if (get_class($this) === QueryRequestComponent::class) {
            $this->addArray(['hapikey' => Container::apikey()]);
        }
    }

    public function getRequest(): RequestInterface
    {
        return $this->request;
    }

    public function getActionDefinition(string $method): ActionSchemaInterface
    {
        return $this->request->getActionDefinition($method);
    }

    public function getResource(): ResourceInterface
    {
        return $this->request->getResource();
    }
}
