<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Containers\ApikeyContainer;
use LTL\Hubspot\Containers\RequestContainer;
use LTL\Hubspot\Core\Request\Interfaces\RequestInterface;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Services\ArrayObject\ArrayObjectService;
use LTL\Hubspot\Services\Observer\Interfaces\SubjectInterface;
use LTL\Hubspot\Services\Observer\Traits\SubjectTrait;

abstract class RequestComponent extends ArrayObjectService implements SubjectInterface
{
    use SubjectTrait;

    public function __construct(private ResourceInterface $resource, array $array = [])
    {
        parent::__construct($array);
    }

    public function getRequest(): RequestInterface
    {
        return RequestContainer::get($this->resource);
    }

    public function addAll(array|null $array): self
    {
        if (is_null($array)) {
            return $this;
        }

        $this->addArray($array);

        return $this;
    }
 
    public function add(string $name, string|int|array|null $value): self
    {
        if (is_null($value)) {
            return $this;
        }
        
        $this[$name] = $value;

        return $this;
    }
}
