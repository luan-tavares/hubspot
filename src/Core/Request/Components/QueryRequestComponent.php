<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Core\HubspotApikey;
use LTL\Hubspot\Core\Interfaces\Request\QueryComponentInterface;
use LTL\Hubspot\Core\Request\Components\AbstractRequestComponent;
use LTL\ListMethods\PublicMethods\Traits\PublicMethodsListable;

class QueryRequestComponent extends AbstractRequestComponent implements QueryComponentInterface
{
    use PublicMethodsListable;

    protected function register(): void
    {
        $apikey = HubspotApikey::get();

        if (!is_null($apikey)) {
            $this->apikey($apikey);
        }
    }

    public function query(string $query, string|null $value = null): self
    {
        return $this->add($query, $value);
    }

    public function q(string $query): self
    {
        return $this->addNotNull('q', $query);
    }

    public function archived(): self
    {
        return $this->addNotNull('archived', 'true');
    }

    public function includeForeignIds(): self
    {
        return $this->addNotNull('includeForeignIds', 'true');
    }

    public function format(string $fileFormat): self
    {
        return $this->addNotNull('format', $fileFormat);
    }

    public function byEmail(): self
    {
        return $this->addNotNull('idProperty', 'email');
    }

    public function limit(int $limit): self
    {
        return $this->addNotNull('limit', $limit);
    }

    public function setCount(int $count): self
    {
        return $this->addNotNull('count', $count);
    }

    public function offset(string|int $hubspotId): self
    {
        return $this->addNotNull('offset', $hubspotId);
    }

    public function vidOffset(string|int $hubspotId): self
    {
        return $this->addNotNull('vidOffset', $hubspotId);
    }

    public function timeOffset(string|int $hubspotId): self
    {
        return $this->addNotNull('timeOffset', $hubspotId);
    }

    public function properties(string $propertiesWithComma): self
    {
        return $this->addNotNull('properties', $propertiesWithComma);
    }

    public function propertiesWithHistory(string $propertiesWithComma): self
    {
        return $this->addNotNull('propertiesWithHistory', $propertiesWithComma);
    }

    public function associations(string $associationsWithComma): self
    {
        return $this->addNotNull('associations', $associationsWithComma);
    }

    public function after(string|null $after): self
    {
        return $this->addNotNull('after', $after);
    }

    public function before(string $before): self
    {
        return $this->addNotNull('before', $before);
    }

    public function apikey(string $apikey): self
    {
        $this->notify('apikeyInserted');

        return $this->addNotNull('hapikey', $apikey);
    }

    public function withProperties($arguments): self
    {
        return $this->addNotNull('property', func_get_args());
    }

    public function withEmails($arguments): self
    {
        return $this->addNotNull('email', func_get_args());
    }

    public function withVids($arguments): self
    {
        return $this->addNotNull('vid', func_get_args());
    }

    public function withListIds($arguments): self
    {
        return $this->addNotNull('listId', func_get_args());
    }

    public function sort($arguments): self
    {
        return $this->addNotNull('sort', func_get_args());
    }

    public function formTypes($arguments): self
    {
        return $this->addNotNull('formTypes', func_get_args());
    }
}
