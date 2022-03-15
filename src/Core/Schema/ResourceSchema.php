<?php

namespace LTL\Hubspot\Core\Schema;

use Exception;
use LTL\Hubspot\Core\HubspotConfig;
use LTL\Hubspot\Core\Interfaces\Resource\ResourceInterface;
use LTL\Hubspot\Core\Interfaces\Schemas\ActionSchemaInterface;
use LTL\Hubspot\Core\Interfaces\Schemas\ResourceSchemaInterface;
use LTL\Hubspot\Factories\ActionSchemaFactory;

/**
 *
 * @property bool $authentication
 * @property array $actions
 * @property string $resourceClass
 * @property string $resource
 * @property int $version
 * @property bool $latest
 * @property string|null $documentation
 */
class ResourceSchema implements ResourceSchemaInterface
{
    private array $data = [
        'actions' => [],
        'resourceClass' => '',
        'resource' => '',
        'documentation' => null,
        'version' => 0,
        'latest' => false,
        'authentication' => true,
    ];

    private array $actionSchemas = [];
    
    public function __construct(ResourceInterface $resource)
    {
        $schema = json_decode(file_get_contents(HubspotConfig::BASE_PATH .'/src/schemas/'. (string) $resource .'.json'));

        $this->data['actions'] = (array) $schema->actions;
        $this->data['resourceClass'] = $resource::class;
        $this->data['resource'] = @$schema->resource;
        $this->data['version'] = @$schema->version;
        $this->data['documentation'] = @$schema->documentation;

        if (isset($schema->latest)) {
            $this->data['latest'] = $schema->latest;
        }
    
        if (isset($schema->authentication)) {
            $this->data['authentication'] = $schema->authentication;
        }
    }

    public function __get($property)
    {
        if (array_key_exists($property, $this->data)) {
            return $this->data[$property];
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
            $this->actionSchemas[$action] = ActionSchemaFactory::build($action, $this);
        }

        return $this->actionSchemas[$action];
    }
}
