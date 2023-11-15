<?php

namespace LTL\Hubspot\Core\Resource\Traits;

use LTL\Hubspot\Core\Interfaces\Response\ResponseInterface;

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
