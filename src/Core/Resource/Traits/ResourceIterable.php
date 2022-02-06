<?php

namespace LTL\Hubspot\Core\Resource\Traits;

use LTL\Hubspot\Core\Response\ResponseObject;

trait ResourceIterable
{
    public function getIterator(): ResponseObject
    {
        return $this->response->getObject();
    }
}
