<?php

namespace LTL\Hubspot\Core\Schemas;

use LTL\Hubspot\Core\Exceptions\HubspotApiException;
use LTL\Hubspot\Core\Request\RequestConstants;
use LTL\Hubspot\Core\Schemas\Base\Schema;
use LTL\Hubspot\Core\Schemas\Interfaces\ActionSchemaInterface;
use LTL\Hubspot\Core\Schemas\Interfaces\ResourceSchemaInterface;

/**
 * @property-read string $baseUri;
 * @property-read ?string $description;
 * @property-read ?string $iterator;
 * @property-read ?string $offset;
 * @property-read ?string $documentation;
 * @property-read ?string $contentType;
 * @property-read ?array $params;
 * @property-read bool $hasBody;
 * @property-read string $method;
 */
class ActionSchema extends Schema implements ActionSchemaInterface
{
    private string $baseUri;

    private ?string $description;

    private ?string $iterator;

    private ?string $offset;

    private ?string $documentation;

    private ?string $contentType;

    private ?array $params;

    private bool $hasBody;

    private string $method;

    public function __construct(private string $action, ResourceSchemaInterface $schema)
    {
        $actionSchema = $schema->actions[$action];
  
        $this->method = $actionSchema->method;
        $this->description = @$actionSchema->description;
        $this->iterator = @$actionSchema->iterator;
        $this->offset = @$actionSchema->offset;
        $this->hasBody = in_array($this->method, RequestConstants::METHODS_WITH_BODY);

        $this->contentType = $this->setContentType($schema, $actionSchema);
        $this->baseUri = $this->setUri($schema, $actionSchema);
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

        return "{$uri}/{$actionSchema->path}";
    }

    private function setParams(object $schema, object $actionSchema): ?array
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

    private function setContentType(object $schema, object $actionSchema): ?string
    {
        if (!$this->hasBody) {
            return null;
        }

        return $actionSchema->contentType ?? RequestConstants::DEFAULT_CONTENT_TYPE;
    }
}
