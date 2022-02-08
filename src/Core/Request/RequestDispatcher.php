<?php

namespace LTL\Hubspot\Core\Request;

use LTL\Hubspot\Containers\RequestContainer;
use LTL\Hubspot\Containers\SchemaContainer;
use LTL\Hubspot\Core\Request\Interfaces\RequestDispatcherInterface;
use LTL\Hubspot\Core\Request\Services\CurlRequestService;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Schemas\Interfaces\ActionSchemaInterface;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Services\Curl\Curl;

abstract class RequestDispatcher implements RequestDispatcherInterface
{
    public static function execute(ResourceInterface $resource, string $action, array $arguments): Curl
    {
        $actionSchema = SchemaContainer::getAction($resource, $action);
        
        $curlService = self::makeCurlService($resource, $actionSchema, $arguments);
     
        return $curlService->connect();
    }

    private static function makeCurlService(ResourceInterface $resource, ActionSchemaInterface $actionSchema, array $arguments): CurlRequestService
    {
        $request = RequestContainer::get($resource);
        
        $params = $actionSchema->params ?? [];
        $nParams = count($params);
        $nArguments = count($arguments);

        HubspotApiException::throwExceptionIf(
            $nParams !== $nArguments,
            '"'. get_class($resource) ."::{$actionSchema}()\" must be {$nParams} params, {$nArguments} given"
        );

        if ($actionSchema->hasBody) {
            $requestBody = array_pop($arguments);

            HubspotApiException::throwExceptionIf(
                !is_array($requestBody),
                '"'. get_class($resource) ."::{$actionSchema}()\" request body (last param) must be array, ". gettype($requestBody) .' given'
            );

            $request->addBody($requestBody);
            array_pop($params);
        }
      
        $request->addHeaders($actionSchema->baseHeader);
        
        $request->addQueries($actionSchema->baseQuery);

        $request->addUri($actionSchema->baseUri, array_combine($params, $arguments), $request->getQueries());

        $request->changeDispatchToTrue();

        return new CurlRequestService($resource, $actionSchema->method);
    }
}
