<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Core\Request\Components\RequestComponent;
use LTL\Hubspot\Core\Request\Interfaces\BodyComponentInterface;

class BodyRequestComponent extends RequestComponent implements BodyComponentInterface
{
    public function add(?array $body): void
    {
        if (is_null($body)) {
            $this->notify('bodyRemoved');

            return;
        }

        $this->empty();

        $this->addArray($body);
    }

    public function get(): ?array
    {
        $body = $this->all();

        if (empty($body)) {
            return null;
        }

        return $body;
    }
}
