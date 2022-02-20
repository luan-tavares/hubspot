<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Containers\ApikeyContainer;
use LTL\Hubspot\Core\Request\Components\RequestComponent;
use LTL\Hubspot\Core\Request\Interfaces\QueryComponentInterface;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\ListMethods\PublicMethods\Traits\PublicMethodsListable;

class QueryRequestComponent extends RequestComponent implements QueryComponentInterface
{
    use PublicMethodsListable;

    public function __construct(ResourceInterface $resource)
    {
        parent::__construct($resource);
        $this->add('hapikey', ApikeyContainer::get());
    }

    public function query(string $query, string|null $value): self
    {
        return $this->add($query, $value);
    }

    public function q(string $query): self
    {
        return $this->add('q', $query);
    }

    public function archived(): self
    {
        return $this->add('archived', 'true');
    }

    public function includeForeignIds(): self
    {
        return $this->add('includeForeignIds', 'true');
    }

    public function format(string $fileFormat): self
    {
        return $this->add('format', $fileFormat);
    }

    public function byEmail(): self
    {
        return $this->add('idProperty', 'email');
    }

    public function limit(int $limit): self
    {
        return $this->add('limit', $limit);
    }

    public function setCount(int $count): self
    {
        return $this->add('count', $count);
    }

    public function offset(string|int $hubspotId): self
    {
        return $this->add('offset', $hubspotId);
    }

    public function vidOffset(string|int $hubspotId): self
    {
        return $this->add('vidOffset', $hubspotId);
    }

    public function timeOffset(string|int $hubspotId): self
    {
        return $this->add('timeOffset', $hubspotId);
    }

    public function properties(string $propertiesWithComma): self
    {
        return $this->add('properties', $propertiesWithComma);
    }

    public function propertiesWithHistory(string $propertiesWithComma): self
    {
        return $this->add('propertiesWithHistory', $propertiesWithComma);
    }

    public function associations(string $associationsWithComma): self
    {
        return $this->add('associations', $associationsWithComma);
    }

    public function after(string $after): self
    {
        return $this->add('after', $after);
    }

    public function before(string $before): self
    {
        return $this->add('before', $before);
    }

    public function apikey(string $apikey): self
    {
        return $this->add('hapikey', $apikey);
    }

    public function listProperties($arguments): self
    {
        return $this->add('property', func_get_args());
    }

    public function listEmails($arguments): self
    {
        return $this->add('email', func_get_args());
    }

    public function sort($arguments): self
    {
        return $this->add('sort', func_get_args());
    }

    public function listVids($arguments): self
    {
        return $this->add('vid', func_get_args());
    }

    public function formTypes($arguments): self
    {
        return $this->add('formTypes', func_get_args());
    }
}
