<?php

namespace LTL\Hubspot\Core\Schema;

use Exception;
use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Interfaces\Schemas\ActionSchemaInterface;
use LTL\Hubspot\Core\Interfaces\Schemas\ResourceSchemaInterface;

/**
 * @property string $baseUri
 * @property string|null $description
 * @property string|null $iteratorIndex
 * @property string|null $afterIndex
 * @property string|null $documentation
 * @property array|null $params
 * @property bool $hasBody
 * @property string $method
 * @property array|null $baseQuery
 * @property array|null $baseHeader
 * @property array|null $resourceClass
 * @property array|null $authentication
 */
class ActionSchema implements ActionSchemaInterface
{
    private string $baseUri;

    private string|null $description;

    private string|null $iteratorIndex;

    private string|null $afterIndex;

    private string|null $documentation;
  
    private array|null $params;

    private array|null $baseQuery;

    private array|null $baseHeader;

    private string $resourceClass;

    private bool $authentication;

    private bool $hasBody;

    private string $method;

    public function __construct(private string $action, ResourceSchemaInterface $schema)
    {
        $actionSchema = $schema->actions[$action];
  
        $this->method = $actionSchema->method;
        $this->description = @$actionSchema->description;
        $this->iteratorIndex = @$actionSchema->iteratorIndex;
        $this->afterIndex = @$actionSchema->afterIndex;
        $this->resourceClass = $schema->resourceClass;
        
        $this->hasBody = (in_array($this->method, HubspotConfig::METHODS_WITH_BODY) && !@$actionSchema->noBody);
       
        $this->baseQuery = $this->setBaseQuery($actionSchema);
        $this->baseHeader = $this->setBaseHeader($actionSchema);
        $this->baseUri = $this->setUri($schema, $actionSchema);
        $this->documentation = $this->setDocumentation($schema, $actionSchema);
        $this->params = $this->setParams($actionSchema);

        $this->authentication = $schema->authentication;

        if (isset($actionSchema->authentication)) {
            $this->authentication = $actionSchema->authentication;
        }
    }

    public function __get($property)
    {
        if (array_key_exists($property, get_object_vars($this))) {
            return $this->{$property};
        }
        
        throw new Exception("Property {$property} not exists in ". __CLASS__);
    }

    public function __isset($property)
    {
        return isset($this->{$property});
    }

    public function __toString()
    {
        return $this->action;
    }

    private function setBaseHeader(object $actionSchema): ?array
    {
        $headers = (array) @$actionSchema->headers;
        
        if ($this->hasBody) {
            $headers['Content-Type'] = @$actionSchema->headers->{'Content-Type'} ?? HubspotConfig::DEFAULT_CONTENT_TYPE;
        }

        if (empty($headers)) {
            return null;
        }

        return $headers;
    }

    private function setBaseQuery(object $actionSchema): ?array
    {
        if (is_null(@$actionSchema->queries)) {
            return null;
        }

        return (array) @$actionSchema->queries;
    }

    private function setDocumentation(object $schema, object $actionSchema): ?string
    {
        $documentation = $actionSchema->documentation ?? $schema->documentation;

        return $documentation;
    }

    private function setUri(object $schema, object $actionSchema): string
    {
        $uri = HubspotConfig::BASE_URL;
        $uri .= (@$schema->resource)?('/'. $schema->resource):('');
        $uri .= (@$schema->version)?('/'. $schema->version):('');

        return "{$uri}/{$actionSchema->path}";
    }

    private function setParams(object $actionSchema): ?array
    {
        preg_match_all('/{(.*?)}/', $actionSchema->path, $matches, PREG_PATTERN_ORDER);
        $arguments = $matches[0];

        if ($this->hasBody) {
            $arguments[] = '{requestBody}';
        }

        if (count($arguments) === 0) {
            return null;
        }

        return $arguments;
    }
}
