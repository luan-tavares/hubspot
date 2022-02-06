<?php

namespace LTL\Hubspot\Core\Request\Services;

use LTL\Hubspot\Containers\RequestContainer;
use LTL\Hubspot\Core\Request\Interfaces\RequestInterface;
use LTL\Hubspot\Core\Request\Services\CurlRequestService;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Schemas\Interfaces\ActionSchemaInterface;
use LTL\Hubspot\Exceptions\HubspotApiException;

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

        $request->addHeaders($actionSchema->baseHeader);

        $request->addQueries($actionSchema->baseQuery);
       
        $uri = str_replace($params, $arguments, $actionSchema->baseUri);

        return new CurlRequestService($resource, $uri, $actionSchema->method);
    }
}
