<?php

namespace LTL\Hubspot\Core\Schemas;

use Countable;
use Exception;
use Iterator;
use LTL\Hubspot\Core\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Schemas\Base\Schema;
use LTL\Hubspot\Core\Schemas\Interfaces\ActionSchemaInterface;
use LTL\Hubspot\Core\Schemas\Interfaces\ResourceSchemaInterface;

class ResourceSchema extends Schema implements Countable, Iterator, ResourceSchemaInterface
{
    private array $actions;

    private array $actionSchemas = [];
    
    private string $class;
  
    private ?string $resource;

    private ?string $version;

    private ?string $documentation;

    private object $schema;


    public function __construct(ResourceInterface $resource)
    {
        $schema = json_decode(file_get_contents(__ROOT__.'/src/schemas/'. (string) $resource .'.json'));

        $this->actions = (array) $schema->actions;
        $this->class = $schema->class;
        $this->resource = @$schema->resource;
        $this->version = @$schema->version;
        $this->documentation = @$schema->documentation;
    }

    public function __get($property)
    {
        if (array_key_exists($property, get_object_vars($this))) {
            return $this->{$property};
        }

        throw new Exception("Property {$property} not exists in ". __CLASS__);
    }

    public function getActions(): array
    {
        return array_keys($this->actions);
    }

    public function mapWithActions(callable $function): array
    {
        return array_map($function, $this->getActions());
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
