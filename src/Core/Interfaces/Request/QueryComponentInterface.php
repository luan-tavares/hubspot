<?php

namespace LTL\Hubspot\Core\Interfaces\Request;

use LTL\Hubspot\Core\Interfaces\Request\ComponentInterface;
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
    public function withProperties($arguments): self;
    public function withEmails($arguments): self;
    public function withVids($arguments): self;
    public function withListIds($arguments): self;
    public function formTypes($arguments): self;
}
