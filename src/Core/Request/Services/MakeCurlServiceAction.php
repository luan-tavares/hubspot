<?php

namespace LTL\Hubspot\Core\Request\Services;

use LTL\Hubspot\Containers\RequestContainer;
use LTL\Hubspot\Core\Exceptions\HubspotApiException;
use LTL\Hubspot\Core\Request\Interfaces\RequestInterface;
use LTL\Hubspot\Core\Request\Services\CurlRequestService;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Schemas\Interfaces\ActionSchemaInterface;

abstract class MakeCurlServiceAction
{
    public static function execute(ResourceInterface $resource, ActionSchemaInterface $actionSchema, array $arguments): CurlRequestService
    {
        $request = RequestContainer::get($resource);

        $params = $actionSchema->params ?? [];
        $nParams = count($params);
        $nArguments = count($arguments);
  
        if ($nParams !== $nArguments) {
            throw new HubspotApiException('"'. get_class($resource) ."::{$actionSchema}()\" must be {$nParams} params, {$nArguments} given");
        }

        if ($actionSchema->hasBody) {
            $request->addBody(array_pop($arguments));
            array_pop($params);
        }
        
        $request->addHeader('Content-Type', $actionSchema->contentType);

        $request->addHeader('accept', $actionSchema->accept);

        $request->addQuery($actionSchema->baseQuery);

        $uri = str_replace($params, $arguments, $actionSchema->baseUri);

        return new CurlRequestService($resource, $uri, $actionSchema->method);
    }
}
