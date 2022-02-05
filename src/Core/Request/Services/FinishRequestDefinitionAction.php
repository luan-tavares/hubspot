<?php

namespace LTL\Hubspot\Core\Request\Services;

use LTL\Hubspot\Containers\RequestContainer;
use LTL\Hubspot\Core\Exceptions\HubspotApiException;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Schemas\Interfaces\ActionSchemaInterface;

class FinishRequestDefinitionAction
{
    public function __construct(
        private ResourceInterface $resource,
        private ActionSchemaInterface $actionSchema,
        private array $arguments
    ) {
    }

    public function __invoke(): void
    {
        $request = RequestContainer::get($this->resource);

        $arguments = $this->arguments;
        $params = $this->actionSchema->params ?? [];

        $uri = $this->actionSchema->baseUri;
        $nParams = count($params);
        $nArguments = count($arguments);
  
        if ($nParams !== $nArguments) {
            throw new HubspotApiException('"'. get_class($this->resource) ."::{$this->actionSchema}()\" must be {$nParams} params ({$nArguments} given)");
        }

        if ($this->actionSchema->hasBody) {
            $request->addBody(array_pop($arguments));
            array_pop($params);
        }

        $request->addUri(str_replace($params, $arguments, $uri));
        
        $request->addMethod($this->actionSchema->method);

        $request->addContentType($this->actionSchema->contentType);

        $request->addQuery($this->actionSchema->baseQuery);
    }
}
