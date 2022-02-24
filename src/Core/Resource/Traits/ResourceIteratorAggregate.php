<?php

namespace LTL\Hubspot\Core\Resource\Traits;

use LTL\Hubspot\Core\Response\Response;

trait ResourceIteratorAggregate
{
    public function getIterator(): Response
    {
        return $this->response;
    }
}
