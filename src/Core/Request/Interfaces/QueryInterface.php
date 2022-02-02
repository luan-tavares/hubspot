<?php
 
namespace LTL\Hubspot\Core\Request\Interfaces;

interface QueryInterface
{
    /**
     * - Add a Query
     *
     * @param string $name
     * @param string|integer|array $value
     * @return self
     */
    public function query(string $name, string|int|array $value): self;
    public function archived(string $archived): self;
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
    public function listEmails($arguments): self;
    public function listVids($arguments): self;
}
