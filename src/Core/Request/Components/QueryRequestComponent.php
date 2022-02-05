<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Core\Request\Components\RequestComponent;
use LTL\Hubspot\Core\Request\Interfaces\QueryComponentInterface;
use LTL\Hubspot\Services\PublicMethods\Traits\PublicMethodsListable;

class QueryRequestComponent extends RequestComponent implements QueryComponentInterface
{
    use PublicMethodsListable;

    public function query(string $name, string|int|array|null $value): self
    {
        $this[$name] = $value;

        return $this;
    }

    public function archived(): self
    {
        return $this->query('archived', 'true');
    }

    public function includeForeignIds(): self
    {
        return $this->query('includeForeignIds', 'true');
    }

    public function format(string $fileFormat): self
    {
        return $this->query('format', $fileFormat);
    }

    public function byEmail(): self
    {
        return $this->query('idProperty', 'email');
    }

    public function limit(int $limit): self
    {
        return $this->query('limit', $limit);
    }

    public function setCount(int $count): self
    {
        return $this->query('count', $count);
    }

    public function offset(string|int $hubspotId): self
    {
        return $this->query('offset', $hubspotId);
    }

    public function vidOffset(string|int $hubspotId): self
    {
        return $this->query('vidOffset', $hubspotId);
    }

    public function timeOffset(string|int $hubspotId): self
    {
        return $this->query('timeOffset', $hubspotId);
    }

    public function properties(string $properties): self
    {
        return $this->query('properties', $properties);
    }

    public function associations(string $associations): self
    {
        return $this->query('associations', $associations);
    }

    public function after(string $after): self
    {
        return $this->query('after', $after);
    }

    public function apikey(string $apikey): self
    {
        return $this->query('hapikey', $apikey);
    }

    public function listProperties($arguments): self
    {
        return $this->query('property', func_get_args());
    }

    public function listEmails($arguments): self
    {
        return $this->query('email', func_get_args());
    }

    public function sort($arguments): self
    {
        return $this->query('sort', func_get_args());
    }

    public function listVids($arguments): self
    {
        return $this->query('vid', func_get_args());
    }
}
