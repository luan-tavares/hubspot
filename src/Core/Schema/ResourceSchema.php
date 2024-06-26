<?php

namespace LTL\Hubspot\Core\Schema;

use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Core\Schema\ActionSchema;
use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Factories\ActionSchemaFactory;

class ResourceSchema
{
    private array $actionSchemas = [];

    private array $actions = [];

    private string $resourceClass;
    
    public function __construct(ResourceInterface $resource)
    {
        $schemaPath = HubspotConfig::BASE_PATH ."/src/schemas/{$resource}.json";

        $schema = json_decode(file_get_contents($schemaPath));
 
        $this->actions = (array) $schema->actions;
        $this->resourceClass = removeFromAnonymousClassName($resource::class);

        foreach ($this->actions as $action => $actionDefinition) {
            $this->actions[$action]->action = $action;
            $this->actions[$action]->resourceClass = $this->resourceClass;
            $this->actions[$action]->resource = $schema->resource;
            $this->actions[$action]->version = $schema->version;
            $this->actions[$action]->isLatestVersion = $schema->latest ?? false;
            $this->actions[$action]->schemaHasAuthentication = $schema->authentication ?? true;
            $this->actions[$action]->defaultProperties = $schema->defaultProperties ?? null;
        }
    }

    public function __toString()
    {
        $actions = array_map(function ($action) {
            return '- '. $this->resourceClass ."::{$action}()\n";
        }, $this->getActions());

        return implode('', $actions) ."\n";
    }

    public function getAction(string $action): object
    {
        if(array_key_exists($action, $this->actions)) {
            return $this->actions[$action];
        }

        throw new HubspotApiException($this->resourceClass ."::{$action}() not exists.");
    }

    public function getActions(): array
    {
        return array_keys($this->actions);
    }

    public function getActionDefinition(string $action): ActionSchema
    {
        if (!array_key_exists($action, $this->actionSchemas)) {
            $this->actionSchemas[$action] = ActionSchemaFactory::build($this, $action);
        }

        return $this->actionSchemas[$action];
    }
}
