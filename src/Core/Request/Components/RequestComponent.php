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

        if (get_class($this) === QueryRequestComponent::class) {
            $this->addArray(['hapikey' => ApikeyContainer::get()]);
        }
    }

    public function getRequest(): RequestInterface
    {
        return RequestContainer::get($this->resource);
    }
}
