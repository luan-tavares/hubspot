<?php

namespace LTL\Hubspot\Core\Request\Interfaces;

use LTL\Hubspot\Core\Request\Interfaces\ComponentInterface;
use LTL\ListMethods\PublicMethods\Interfaces\PublicMethodsListableInterface;

interface QueryComponentInterface extends ComponentInterface, PublicMethodsListableInterface
{
    public function query(string $query, string|null $value = null): self;
    public function byEmail(): self;
    public function q(string $query): self;
    public function archived(): self;
    public function includeForeignIds(): self;
    public function format(string $fileFormat): self;
    public function limit(int $limit): self;
    public function setCount(int $count): self;
    public function offset(string|int $hubspotId): self;
    public function vidOffset(string|int $hubspotId): self;
    public function timeOffset(string|int $hubspotId): self;
    public function propertiesWithHistory(string ...$properties): self;
    public function properties(string ...$properties): self;
    public function associations(string ...$associations): self;
    public function after(string|null $after): self;
    public function before(string $before): self;
    public function apikey(string $apikey): self;
    public function sort($arguments): self;
    public function withProperties(string ...$property): self;
    public function withEmails(string ...$email): self;
    public function withVids(int ...$id): self;
    public function withListIds(int ...$id): self;
    public function formTypes($arguments): self;
    public function includeListFilters(): self;
    public function enrollObjectsUpdateList(): self;
    public function listIds(int ...$listId): self;
}
