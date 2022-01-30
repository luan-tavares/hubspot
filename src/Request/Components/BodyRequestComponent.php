<?php

namespace LTL\HubspotApi\Request\Components;

use LTL\HubspotApi\Request\Components\RequestComponent;

class BodyRequestComponent extends RequestComponent
{
    public function add(?array $body): void
    {
        if (is_null($body)) {
            $this->notify('removeContentType');

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
