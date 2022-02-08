<?php

namespace LTL\Hubspot\Core\Resource\Traits;

use LTL\Hubspot\Core\Response\Response;

trait ResourceIterable
{
    public function getIterator(): Response
    {
        return $this->response;
    }
}
