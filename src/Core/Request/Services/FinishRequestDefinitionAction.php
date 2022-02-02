<?php

namespace LTL\Hubspot\Core\Request\Services;

use LTL\Hubspot\Core\Exceptions\HubspotApiException;
use LTL\Hubspot\Core\Request\Interfaces\RequestInterface;
use LTL\Hubspot\Core\Schemas\Interfaces\ActionSchemaInterface;

class FinishRequestDefinitionAction
{
    public function __construct(
        private RequestInterface $request,
        private ActionSchemaInterface $actionSchema,
        private array $arguments
    ) {
    }

    public function __invoke(): void
    {
        $arguments = $this->arguments;
        $params = $this->actionSchema->params ?? [];

        $uri = $this->actionSchema->baseUri;
        $nParams = count($params);
        $nArguments = count($arguments);
  

        if ($nParams !== $nArguments) {
            throw new HubspotApiException(
                get_class($this->request->getResource()) ."::{$this->actionSchema}() must be {$nParams} params. {$nArguments} given!"
            );
        }

        if ($this->actionSchema->hasBody) {
            $this->request->addBody(array_pop($arguments));
            array_pop($params);
        }

        $this->request->addUri(str_replace($params, $arguments, $uri));
        
        $this->request->addMethod($this->actionSchema->method);

        $this->request->addContentType($this->actionSchema->contentType);

        $this->request->addQuery($this->actionSchema->baseQuery);
    }
}
