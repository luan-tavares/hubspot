<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Core\BodyBuilder\SearchBuilder\SearchBuilder;
use LTL\Hubspot\Core\Interfaces\Request\BodyComponentInterface;
use LTL\Hubspot\Core\Interfaces\Schemas\ActionSchemaInterface;
use LTL\Hubspot\Core\Request\Components\RequestComponent;
use LTL\Hubspot\Exceptions\HubspotApiException;

class BodyRequestComponent extends RequestComponent implements BodyComponentInterface
{
    public function create(ActionSchemaInterface $actionSchema, array $arguments): void
    {
        if (!$actionSchema->hasBody) {
            return;
        }

        $requestBody = array_pop($arguments);

        if (is_array($requestBody)) {
            $this->addArrayAfter($requestBody);

            return;
        }

        if ($requestBody instanceof SearchBuilder) {
            $this->addArrayAfter($requestBody->get());

            return;
        }

        throw new HubspotApiException(
            '"'. $actionSchema->resourceClass ."::{$actionSchema}()\" request body (last param) must be array or Body Object, ". gettype($requestBody) .' given'
        );

        return;
    }
}
