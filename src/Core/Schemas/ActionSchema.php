<?php

namespace LTL\Hubspot\Core\Schemas;

use LTL\Hubspot\Core\Exceptions\HubspotApiException;
use LTL\Hubspot\Core\Request\RequestConstants;
use LTL\Hubspot\Core\Schemas\Base\Schema;
use LTL\Hubspot\Core\Schemas\Interfaces\ActionSchemaInterface;

/**
 * @property-read string $method;
 * @property-read string $path;
 * @property-read string $uri;
 * @property-read ?string $description;
 * @property-read ?string $iterator;
 * @property-read ?string $documentation;
 * @property-read ?string $contentType;
 * @property-read array $params;
 * @property-read bool $hasBody;
 */
class ActionSchema extends Schema implements ActionSchemaInterface
{
    private string $method;

    private string $path;

    private string $uri;

    private ?string $description;

    private ?string $iterator;

    private ?string $documentation;

    private ?string $contentType;

    private array $params;

    private bool $hasBody;

    public function __construct(private string $action, object $schema)
    {
        $actionSchema = $schema->actions->{$action};
              
        
        $this->path = $actionSchema->path;
        $this->method = $actionSchema->method;
        $this->description = @$actionSchema->description;
        $this->iterator = @$actionSchema->iterator;
        $this->hasBody = in_array($this->method, RequestConstants::METHODS_WITH_BODY);

        $this->contentType = $this->setContentType($schema, $actionSchema);
        $this->uri = $this->setUri($schema, $actionSchema);
        $this->documentation = $this->setDocumentation($schema, $actionSchema);
        $this->params = $this->setParams($schema, $actionSchema);
    }

    public function __get($property)
    {
        if (array_key_exists($property, get_object_vars($this))) {
            return $this->{$property};
        }
        

        throw new HubspotApiException("Property {$property} not exists in ". __CLASS__);
    }

    public function __toString()
    {
        return $this->action;
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

        return "{$uri}/{$this->path}";
    }

    private function setParams(object $schema, object $actionSchema): array
    {
        preg_match_all('/{(.*?)}/', $this->path, $matches, PREG_PATTERN_ORDER);
        $arguments = $matches[0];

        if ($this->hasBody) {
            $arguments[] = '{requestBody}';
        }

        return $arguments;
    }

    private function setContentType(object $schema, object $actionSchema): ?string
    {
        if (!$this->hasBody) {
            return null;
        }

        return $actionSchema->contentType ?? RequestConstants::DEFAULT_CONTENT_TYPE;
    }
}
