<?php

namespace LTL\Hubspot\Core\Request;

use LTL\Hubspot\Core\Request\Interfaces\RequestActionDefinitionInterface;
use LTL\Hubspot\Core\Request\Interfaces\RequestInterface;
use LTL\Hubspot\Core\Request\RequestCurlCaller;
use LTL\Hubspot\Core\Request\Services\CurlRequestService;
use LTL\Hubspot\Core\Schemas\Interfaces\ActionSchemaInterface;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Services\Curl\Curl;

abstract class RequestActionDefinition implements RequestActionDefinitionInterface
{
    public static function finish(RequestInterface $request, ActionSchemaInterface $actionSchema, array $arguments): RequestCurlCaller
    {
        self::changeRequestWithAction($request, $actionSchema, $arguments);
     
        return new RequestCurlCaller($request, $actionSchema->method);
    }

    private static function changeRequestWithAction(RequestInterface $request, ActionSchemaInterface $actionSchema, array $arguments): void
    {
        $params = $actionSchema->params ?? [];
        $nParams = count($params);
        $nArguments = count($arguments);

        HubspotApiException::throwExceptionIf(
            $nParams !== $nArguments,
            '"'. $actionSchema->resourceClass ."::{$actionSchema}()\" must be {$nParams} params, {$nArguments} given"
        );

        if ($actionSchema->hasBody) {
            $requestBody = array_pop($arguments);

            HubspotApiException::throwExceptionIf(
                !is_array($requestBody),
                '"'. $actionSchema->resourceClass ."::{$actionSchema}()\" request body (last param) must be array, ". gettype($requestBody) .' given'
            );

            $request->addBody($requestBody);
            array_pop($params);
        }
      
        $request->addHeaders($actionSchema->baseHeader);
        
        $request->addQueries($actionSchema->baseQuery);

        $request->addUri($actionSchema->baseUri, array_combine($params, $arguments), $request->getQueries());

        $request->changeDispatchToTrue();

        return;
    }
}
