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

    private function filter(string $property, string $operator, array|string|int|null $value = null, string|int|null $highValue = null): SearchBuilder
    {
        $array = $this->bodyBuilder['filterGroups'];

        $array[$this->filterGroupIndex]['filters'][$this->filterIndex] = [
            'propertyName' => $property,
            'operator' => $operator,
        ];

        if ($operator === 'IN' or $operator === 'NOT_IN') {
            $array[$this->filterGroupIndex]['filters'][$this->filterIndex]['values'] = $value;
            $this->filterIndex++;

            return $this->bodyBuilder->add('filterGroups', $array);
        }

        if (!is_null($value)) {
            $array[$this->filterGroupIndex]['filters'][$this->filterIndex]['value'] = $value;
        }

        if (!is_null($highValue)) {
            $array[$this->filterGroupIndex]['filters'][$this->filterIndex]['highValue'] = $highValue;
        }

        $this->filterIndex++;

        return $this->bodyBuilder->add('filterGroups', $array);
    }

    public function filterIn(string $property, array $values): SearchBuilder
    {
        return $this->filter($property, 'IN', $values);
    }

    public function filterNotIn(string $property, array $values): SearchBuilder
    {
        return $this->filter($property, 'NOT_IN', $values);
    }

    public function filterEqual(string $property, string|int $value): SearchBuilder
    {
        return $this->filter($property, 'EQ', $value);
    }

    public function filterContains(string $property, string|int $value): SearchBuilder
    {
        return $this->filter($property, 'CONTAINS_TOKEN', $value);
    }

    public function filterNotContains(string $property, string|int $value): SearchBuilder
    {
        return $this->filter($property, 'NOT_CONTAINS_TOKEN', $value);
    }

    public function filterNotEqual(string $property, string|int $value): SearchBuilder
    {
        return $this->filter($property, 'NEQ', $value);
    }

    public function filterBetween(string $property, string|int $value, string|int $highValue): SearchBuilder
    {
        return $this->filter($property, 'BETWEEN', $value, $highValue);
    }

    public function filterLess(string $property, string|int $value): SearchBuilder
    {
        return $this->filter($property, 'LT', $value);
    }

    public function filterLessOrEqual(string $property, string|int $value): SearchBuilder
    {
        return $this->filter($property, 'LTE', $value);
    }

    public function filterGreater(string $property, string|int $value): SearchBuilder
    {
        return $this->filter($property, 'GT', $value);
    }

    public function filterGreaterOrEqual(string $property, string|int $value): SearchBuilder
    {
        return $this->filter($property, 'GTE', $value);
    }

    public function filterHas(string $property): SearchBuilder
    {
        return $this->filter($property, 'HAS_PROPERTY');
    }

    public function filterNotHas(string $property): SearchBuilder
    {
        return $this->filter($property, 'NOT_HAS_PROPERTY');
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