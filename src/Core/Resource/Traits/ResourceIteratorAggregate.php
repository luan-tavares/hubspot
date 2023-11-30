<?php

namespace LTL\Hubspot\Core\Resource\Traits;

use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;

/**
 * @property ResponseInterface $response
 */
trait ResourceIteratorAggregate
{
    public function getIterator(): ResponseInterface
    {
        return $this->response;
    }
}
