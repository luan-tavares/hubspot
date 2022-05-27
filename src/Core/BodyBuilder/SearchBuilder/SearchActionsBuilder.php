<?php

namespace LTL\Hubspot\Core\BodyBuilder\SearchBuilder;

use LTL\Hubspot\Core\BodyBuilder\ActionsBuilder;
use LTL\Hubspot\Core\BodyBuilder\Interfaces\SearchActionsBuilderInterface;
use LTL\Hubspot\Core\BodyBuilder\SearchBuilder\SearchBuilder;

class SearchActionsBuilder extends ActionsBuilder implements SearchActionsBuilderInterface
{
    private int $filterGroupIndex = 0;

    private int $filterIndex = 0;

    private int $sortIndex = 0;

    public function after(string|int $after): SearchBuilder
    {
        return $this->bodyBuilder->add('after', $after);
    }

    public function limit(string|int $limit): SearchBuilder
    {
        return $this->bodyBuilder->add('limit', $limit);
    }

    public function filterGroup(callable $function): SearchBuilder
    {
        if ($this->filterIndex !== 0) {
            $this->filterGroupIndex++;
            $this->filterIndex = 0;
        }
        $function($this->bodyBuilder);
        $this->filterGroupIndex++;
        $this->filterIndex = 0;

        return $this->bodyBuilder;
    }

    private function filter(string $property, string $operator, string|int|null $value = null): SearchBuilder
    {
        $array = $this->bodyBuilder['filterGroups'];

        $array[$this->filterGroupIndex]['filters'][$this->filterIndex] = [
            'propertyName' => $property,
            'operator' => $operator,
        ];

        if (!is_null($value)) {
            $array[$this->filterGroupIndex]['filters'][$this->filterIndex]['value'] = $value;
        }

        $this->filterIndex++;
    

        return $this->bodyBuilder->add('filterGroups', $array);
    }

    public function filterEqual(string $property, string|int $value): SearchBuilder
    {
        return $this->filter($property, 'EQ', $value);
    }

    public function filterHas(string $property): SearchBuilder
    {
        return $this->filter($property, 'HAS_PROPERTY');
    }

    public function properties(string ...$arguments): SearchBuilder
    {
        return $this->bodyBuilder->add('properties', $arguments);
    }

    private function sortBy(string $property, string $direction): SearchBuilder
    {
        $array = $this->bodyBuilder['sorts'];

        $array[$this->sortIndex] =  [
            'propertyName' => $property,
            'direction' => $direction
        ];

        $this->sortIndex++;

        return $this->bodyBuilder->add('sorts', $array);
    }

    public function sortAsc(string $property): SearchBuilder
    {
        return $this->sortBy($property, 'ASCENDING');
    }

    public function sortDesc(string $property): SearchBuilder
    {
        return $this->sortBy($property, 'DESCENDING');
    }
}
