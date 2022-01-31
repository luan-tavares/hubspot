<?php

namespace LTL\Hubspot\Core\Request\Services;

use LTL\Hubspot\Core\Request\Components\BodyRequestComponent;
use LTL\Hubspot\Core\Request\Components\HeaderRequestComponent;
use LTL\Hubspot\Core\Request\Components\UriRequestComponent;
use LTL\Hubspot\Core\Request\RequestConstants;
use LTL\Hubspot\Core\Exceptions\HubspotResourceException;

class MethodSchemaService
{
    private $withBodyMethods = ['PUT', 'POST', 'PATCH'];

    public function __construct(private string $action, private array $arguments)
    {
    }

    public function resolveActionSchema(UriRequestComponent $uriComponent, BodyRequestComponent $bodyComponent): void
    {
        $schema = $uriComponent->getSchema();

        $arguments = $this->arguments;

        $uri = RequestConstants::BASE_URL;
        $uri .= (@$schema['resource'])?('/'. $schema['resource']):('');
        $uri .= (@$schema['version'])?('/'. $schema['version']):('');
       
        $methodSchema = $uriComponent->getActionSchema($this->action);

        $uriPath = $methodSchema['path'];
        $method = $methodSchema['method'];

        preg_match_all('/{(.*?)}/', $uriPath, $matches, PREG_PATTERN_ORDER);

        $fixedParams = $matches[1];

        $nParams = count($fixedParams);
        $nArguments = count($this->arguments);

        if (in_array($methodSchema['method'], $this->withBodyMethods)) {
            $nParams++;
        }

        if ($nParams !== $nArguments) {
            throw new HubspotResourceException(
                get_class($uriComponent->getResource()) ."::{$this->action}() must be {$nParams} params. {$nArguments} given!"
            );
        }

        foreach ($fixedParams as $param) {
            $uriPath = str_replace("{{$param}}", $arguments[0], $uriPath);

            array_shift($arguments);
        }

        $uriComponent->addUri("{$uri}/{$uriPath}");

        $uriComponent->addMethod($method);


        $bodyComponent->add(@$arguments[0]);
    }

    public function resolveContentType(HeaderRequestComponent $headerComponent): void
    {
        $methodSchema = $headerComponent->getActionSchema($this->action);
      
        if (!array_key_exists('contentType', $methodSchema)) {
            return;
        }
        
        $headerComponent->header('Content-Type', $methodSchema['contentType']);
    }
}
