<?php

namespace LTL\Hubspot\Core\Traits;

use LTL\Hubspot\Core\Exceptions\HubspotApiException;
use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;

trait ResourceIterable
{
    private $i = 0;

    public function count(): int
    {
        return count($this->response->{$this->index});
    }

    public function rewind(): void
    {
        $this->i = 0;
    }
    
    public function current(): mixed
    {
        return $this->response->{$this->index}[$this->i];
    }
    
    public function key(): mixed
    {
        return $this->i;
    }
    
    public function next(): void
    {
        ++$this->i;
    }
    
    public function valid(): bool
    {
        return isset($this->response->{$this->index}[$this->i]);
    }
}
