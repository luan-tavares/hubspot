<?php

namespace LTL\Hubspot\Core\Schema;

use Exception;
use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Interfaces\Schemas\ActionSchemaInterface;
use LTL\Hubspot\Core\Interfaces\Schemas\ResourceSchemaInterface;

/**
 * @property-read string $baseUri
 * @property-read string|null $description
 * @property-read string|null $iterator
 * @property-read string|null $after
 * @property-read string|null $documentation
 * @property-read array|null $params
 * @property-read bool $hasBody
 * @property-read string $method
 * @property-read array|null $baseQuery
 * @property-read array|null $baseHeader
 * @property-read array|null $resourceClass
 */
class ActionSchema implements ActionSchemaInterface
{
    private string $baseUri;

    private string|null $description;

    private string|null $iterable;

    private string|null $after;

    private string|null $documentation;
  
    private array|null $params;

    private array|null $baseQuery;

    private array|null $baseHeader;

    private string $resourceClass;

    private bool $hasBody;

    private string $method;

    public function __construct(private string $action, ResourceSchemaInterface $schema)
    {
        $actionSchema = $schema->actions[$action];
  
        $this->method = $actionSchema->method;
        $this->description = @$actionSchema->description;
        $this->iterable = @$actionSchema->iterable;
        $this->after = @$actionSchema->after;
        $this->resourceClass = $schema->class;
        
        $this->hasBody = (in_array($this->method, HubspotConfig::METHODS_WITH_BODY) && !@$actionSchema->noBody);
       
        $this->baseQuery = $this->setBaseQuery($actionSchema);
        $this->baseHeader = $this->setBaseHeader($actionSchema);
        $this->baseUri = $this->setUri($schema, $actionSchema);
        $this->documentation = $this->setDocumentation($schema, $actionSchema);
        $this->params = $this->setParams($actionSchema);
    }

    public function __get($property)
    {
        if (array_key_exists($property, get_object_vars($this))) {
            return $this->{$property};
        }
        
        throw new Exception("Property {$property} not exists in ". __CLASS__);
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
