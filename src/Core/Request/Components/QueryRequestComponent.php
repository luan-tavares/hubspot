<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Core\Globals\ApikeyGlobal;
use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Request\Components\AbstractRequestComponent;
use LTL\Hubspot\Core\Request\Interfaces\QueryComponentInterface;
use LTL\ListMethods\PublicMethods\Traits\PublicMethodsListable;

class QueryRequestComponent extends AbstractRequestComponent implements QueryComponentInterface
{
    use PublicMethodsListable;

    protected function register(): void
    {
        if (!is_null($apikey = ApikeyGlobal::get())) {
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

    public function maxLimit(): self
    {
        return $this->limit(HubspotConfig::MAX_LIMIT);
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

    public function properties(string ...$properties): self
    {
        $propertiesWithComma = implode(',', $properties);

        return $this->addNotNull('properties', $propertiesWithComma);
    }

    public function propertiesWithHistory(string ...$properties): self
    {
        $propertiesWithComma = implode(',', $properties);

        return $this->addNotNull('propertiesWithHistory', $propertiesWithComma);
    }

    public function associations(string ...$associations): self
    {
        $associationsWithComma = implode(',', $associations);

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
        $this->request->removeOAuth();

        return $this->addNotNull('hapikey', $apikey);
    }

    public function withProperties(string ...$property): self
    {
        return $this->addNotNull('property', func_get_args());
    }

    public function withEmails(string ...$email): self
    {
        return $this->addNotNull('email', func_get_args());
    }

    public function withVids(int ...$id): self
    {
        return $this->addNotNull('vid', func_get_args());
    }

    public function withListIds(int ...$id): self
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

    public function withListFilters(): self
    {
        return $this->addNotNull('includeFilters', 'true');
    }

    public function enrollObjectsUpdateList(): self
    {
        return $this->addNotNull('enrollObjectsInWorkflows', 'true');
    }

    public function listIds(int ...$listId): self
    {
        return $this->addNotNull('listIds', func_get_args());
    }
}
