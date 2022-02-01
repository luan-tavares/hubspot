<?php

namespace LTL\Hubspot\Core\Traits;

use LTL\Hubspot\Core\Exceptions\HubspotApiException;
use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;

trait ResourceIterable
{
    private ResponseInterface $response;

    private $index;

    private int $i = 0;

    private function index()
    {
        if (is_null($this->index)) {
            $this->index = $this->response->getIterator();
        }

        if (is_null($this->index)) {
            throw new HubspotApiException(get_class($this) ."::{$this->response->getAction()}() response is not Iterable/Countable.");
        }

        return $this->index;
    }

    public function count(): int
    {
        return count($this->response[$this->index()]);
    }

    public function rewind(): void
    {
        $this->i = 0;
    }
    
    public function current(): mixed
    {
        return $this->response[$this->index()][$this->i];
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
        return isset($this->response[$this->index()][$this->i]);
    }
}
