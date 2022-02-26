<?php

namespace LTL\Hubspot\Factories;

use LTL\Hubspot\Containers\RequestContainer;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;
use LTL\Hubspot\Core\Interfaces\Response\ResponseInterface;
use LTL\Hubspot\Core\Request\RequestActionDefinition;
use LTL\Hubspot\Core\Response\Response;
use LTL\Hubspot\Interfaces\FactoryInterface;

abstract class ResponseFactory implements FactoryInterface
{
    public static function build(ResourceInterface $resource, string $method, array $arguments): ResponseInterface
    {
        $actionSchema = SchemaContainer::getAction($resource, $method);

        $request = RequestContainer::get($resource);

        $curlService = RequestActionDefinition::finish($request, $actionSchema, $arguments);

        return new Response($curlService->connect(), $actionSchema);
    }
}
