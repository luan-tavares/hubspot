<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Core\Request\Components\RequestComponent;

class BodyRequestComponent extends RequestComponent
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

    public function getBody(): ?array
    {
        $body = $this->all();

        if (empty($body)) {
            return null;
        }

        return $body;
    }
}
