<?php

namespace LTL\HubspotApi\Request\Services;

use LTL\HubspotApi\Exceptions\HubspotResourceException;
use LTL\HubspotApi\Request\Components\BodyRequestComponent;
use LTL\HubspotApi\Request\Components\HeaderRequestComponent;
use LTL\HubspotApi\Request\Components\UriRequestComponent;
use LTL\HubspotApi\Request\RequestConstants;

class MethodSchemaService
{
    private $withBodyMethods = ['PUT', 'POST', 'PATCH'];

    public function __construct(private string $method, private array $arguments)
    {
    }

    public function resolveMethodSchema(UriRequestComponent $uriComponent, BodyRequestComponent $bodyComponent): void
    {
        $schema = $uriComponent->getSchema();

        $arguments = $this->arguments;

        $uri = RequestConstants::BASE_URL;
        $uri .= (@$schema['resource'])?('/'. $schema['resource']):('');
        $uri .= (@$schema['version'])?('/'. $schema['version']):('');
       
        $methodSchema = $uriComponent->getMethodSchema($this->method);

        $uriPath = $methodSchema['path'];
        $action = $methodSchema['action'];

        preg_match_all('/{(.*?)}/', $uriPath, $matches, PREG_PATTERN_ORDER);

        $fixedParams = $matches[1];

        $nParams = count($fixedParams);
        $nArguments = count($this->arguments);

        if (in_array($methodSchema['action'], $this->withBodyMethods)) {
            $nParams++;
        }

        if ($nParams !== $nArguments) {
            throw new HubspotResourceException(
                get_class($uriComponent->getResource()) ."::{$this->method}() must be {$nParams} params. {$nArguments} given!"
            );
        }

        foreach ($fixedParams as $param) {
            $uriPath = str_replace("{{$param}}", $arguments[0], $uriPath);

            array_shift($arguments);
        }

        $uriComponent->addUri("{$uri}/{$uriPath}");

        $uriComponent->addAction($action);

        $bodyComponent->add(@$arguments[0]);
    }

    public function resolveContentType(HeaderRequestComponent $headerComponent): void
    {
        $methodSchema = $headerComponent->getMethodSchema($this->method);
      
        if (!array_key_exists('contentType', $methodSchema)) {
            return;
        }
        
        $headerComponent->header('Content-Type', $methodSchema['contentType']);
    }
}
