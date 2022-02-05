<?php

namespace LTL\Hubspot\Core\Schemas;

use Exception;
use LTL\Hubspot\Core\Request\RequestConstants;
use LTL\Hubspot\Core\Schemas\Base\Schema;
use LTL\Hubspot\Core\Schemas\Interfaces\ActionSchemaInterface;
use LTL\Hubspot\Core\Schemas\Interfaces\ResourceSchemaInterface;

/**
 * @property-read string $baseUri
 * @property-read string|null $description
 * @property-read string|null $iterator
 * @property-read string|null $after
 * @property-read string|null $documentation
 * @property-read string|null $contentType
 * @property-read array|null $params
 * @property-read bool $hasBody
 * @property-read string $method
 * @property-read array|null $baseQuery
 */
class ActionSchema extends Schema implements ActionSchemaInterface
{
    private string $baseUri;

    private string|null $description;

    private string|null $iterable;

    private string|null $after;

    private string|null $documentation;

    private string|null $contentType;

    private array|null $params;

    private bool $hasBody;

    private array|null $baseQuery;

    private string $method;

    public function __construct(private string $action, ResourceSchemaInterface $schema)
    {
        $actionSchema = $schema->actions[$action];
  
        $this->method = $actionSchema->method;
        $this->description = @$actionSchema->description;
        $this->iterable = @$actionSchema->iterable;
        $this->after = @$actionSchema->after;
        $this->hasBody = in_array($this->method, RequestConstants::METHODS_WITH_BODY);

        $this->baseQuery = $this->setBaseQuery($actionSchema);
        $this->contentType = $this->setContentType($actionSchema);
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
        $uri = RequestConstants::BASE_URL;
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

    private function setContentType(object $actionSchema): ?string
    {
        if (!$this->hasBody) {
            return null;
        }

        return $actionSchema->contentType ?? RequestConstants::DEFAULT_CONTENT_TYPE;
    }
}
