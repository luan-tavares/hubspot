<?php

namespace LTL\Hubspot\Core\Request\Services;

use LTL\Hubspot\Core\Exceptions\HubspotApiException;
use LTL\Hubspot\Core\Request\Components\BodyRequestComponent;
use LTL\Hubspot\Core\Request\Components\HeaderRequestComponent;
use LTL\Hubspot\Core\Request\Components\UriRequestComponent;
use LTL\Hubspot\Core\Request\RequestConstants;
use LTL\Hubspot\Core\Schemas\Interfaces\ActionSchemaInterface;

class MethodSchemaService
{
    public function __construct(private ActionSchemaInterface $actionSchema, private array $arguments)
    {
    }

    public function resolveActionSchema(UriRequestComponent $uriComponent, BodyRequestComponent $bodyComponent): void
    {
        $arguments = $this->arguments;
        $params = $this->actionSchema->params;

        $uri = $this->actionSchema->uri;
        $nParams = count($params);
        $nArguments = count($arguments);
  

        if ($nParams !== $nArguments) {
            throw new HubspotApiException(
                get_class($uriComponent->getResource()) ."::{$this->actionSchema}() must be {$nParams} params. {$nArguments} given!"
            );
        }

        if ($this->actionSchema->hasBody) {
            $bodyComponent->add(array_pop($arguments));
            array_pop($params);
        }

        $uri = str_replace($params, $arguments, $uri);

        $uriComponent->addUri($uri);

        $uriComponent->addMethod($this->actionSchema->method);
    }

    public function resolveContentType(HeaderRequestComponent $headerComponent): void
    {
        if (!is_null($this->actionSchema->contentType)) {
            $headerComponent->contentType($this->actionSchema->contentType);
        }
    }
}
