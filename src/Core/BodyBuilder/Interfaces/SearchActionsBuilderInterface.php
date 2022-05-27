<?php

namespace LTL\Hubspot\Core\BodyBuilder\Interfaces;

use LTL\Hubspot\Core\BodyBuilder\SearchBuilder\SearchBuilder;

interface SearchActionsBuilderInterface
{
    public function after(string|int $after): SearchBuilder;
    public function limit(string|int $limit): SearchBuilder;
    public function filterGroup(callable $function): SearchBuilder;
    public function filterEqual(string $property, string|int $value): SearchBuilder;
    public function filterHas(string $property): SearchBuilder;
    public function properties(string ...$arguments): SearchBuilder;
    public function sortAsc(string $property): SearchBuilder;
    public function sortDesc(string $property): SearchBuilder;
}
