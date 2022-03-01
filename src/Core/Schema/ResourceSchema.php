<?php

namespace LTL\Hubspot\Core\Schema;

use Countable;
use Exception;
use Iterator;
use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;
use LTL\Hubspot\Core\Interfaces\Schemas\ActionSchemaInterface;
use LTL\Hubspot\Core\Interfaces\Schemas\ResourceSchemaInterface;

/**
 *
 * @property array|null $authentication
 * @property array $actions
 * @property array $resourceClass
 * @property  array $actionSchemas
 * @property string $resourceClass
 * @property string|null $resource
 * @property string|null $version
 * @property string|null $documentation
 * @property object $schema
 */
class ResourceSchema implements Countable, Iterator, ResourceSchemaInterface
{
    private array $actions;

    private array $actionSchemas = [];
    
    private string $resourceClass;
  
    private string|null $resource;

    private string|null $version;

    private string|null $documentation;

    private object $schema;

    private bool $authentication = true;

    public function __construct(ResourceInterface $resource)
    {
        $schema = json_decode(file_get_contents(HubspotConfig::BASE_PATH .'/src/schemas/'. (string) $resource .'.json'));

        $this->actions = (array) $schema->actions;
        $this->resourceClass = $resource::class;
        $this->resource = @$schema->resource;
        $this->version = @$schema->version;
        $this->documentation = @$schema->documentation;

        if (isset($schema->authentication)) {
            $this->authentication = $schema->authentication;
        }
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
        $actions = array_map(function ($action) {
            return "- {$this->resourceClass}::{$action}()\n";
        }, $this->getActions());

        return implode('', $actions) ."\n";
    }

    public function getActions(): array
    {
        return array_keys($this->actions);
    }

    public function getActionDefinition(string $action): ActionSchemaInterface
    {
        if (!array_key_exists($action, $this->actionSchemas)) {
            $this->actionSchemas[$action] = new ActionSchema($action, $this);
        }

        return $this->actionSchemas[$action];
    }

    /***Countable */

    public function count(): int
    {
        return count($this->actions);
    }

    /**Iterator */

    public function rewind(): void
    {
        reset($this->actions);
    }
    
    public function current(): mixed
    {
        return current($this->actions);
    }
    
    public function key(): mixed
    {
        return key($this->actions);
    }
    
    public function next(): void
    {
        next($this->actions);
    }
    
    public function valid(): bool
    {
        return key($this->actions) !== null;
    }
}
