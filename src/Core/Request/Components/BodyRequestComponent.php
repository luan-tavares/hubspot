<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Core\Request\Components\RequestComponent;
use LTL\Hubspot\Core\Request\Interfaces\BodyComponentInterface;

class BodyRequestComponent extends RequestComponent implements BodyComponentInterface
{
    public function get(): ?array
    {
        $body = $this->all();

        if (empty($body)) {
            return null;
        }

        return $body;
    }
}
