<?php
 
namespace LTL\Hubspot\Core\Request\Interfaces;

use LTL\Hubspot\Core\Request\Interfaces\ComponentInterface;
use LTL\Hubspot\Services\PublicMethods\Interfaces\PublicMethodsListableInterface;

interface QueryComponentInterface extends ComponentInterface, PublicMethodsListableInterface
{
    /**
     * - Add a Query
     *
     * @param string $name
     * @param string|integer|array $value
     * @return self
     */
    public function query(string $name, string|int|array|null $value): self;
    public function byEmail(): self;
    public function archived(): self;
    public function includeForeignIds(): self;
    public function format(string $fileFormat): self;
    public function limit(int $limit): self;
    public function setCount(int $count): self;
    public function offset(string|int $hubspotId): self;
    public function vidOffset(string|int $hubspotId): self;
    public function timeOffset(string|int $hubspotId): self;
    public function properties(string $properties): self;
    public function associations(string $associations): self;
    public function after(string $after): self;
    public function apikey(string $apikey): self;
    public function listProperties($arguments): self;
    public function sort($arguments): self;
    public function listEmails($arguments): self;
    public function listVids($arguments): self;
}
