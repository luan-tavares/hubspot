<?php

namespace LTL\Hubspot\Core\Schema;

use Exception;
use LTL\Hubspot\Core\Interfaces\Schemas\ActionSchemaInterface;
use LTL\Hubspot\Core\Interfaces\Schemas\ResourceSchemaInterface;
use LTL\Hubspot\Core\Schema\ActionProperties\ActionProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\ActionPropertyConstructor;
use LTL\Hubspot\Core\Schema\ActionProperties\AfterIndexActionProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\AuthenticationActionProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\BaseHeaderActionProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\BaseQueryActionProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\BaseUriActionProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\DescriptionActionProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\DocumentationActionProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\HasBodyActionProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\IteratorIndexActionProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\MethodActionProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\ParamsActionProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\ResourceClassActionProperty;

/**
 * @property array|null $params
 * @property array|null $baseQuery
 * @property array|null $baseHeader
 * @property bool $authentication
 * @property bool $hasBody
 * @property string|null $description
 * @property string|null $iteratorIndex
 * @property string|null $afterIndex
 * @property string|null $documentation
 * @property string $resourceClass
 * @property string $baseUri
 * @property string $method
 */
class ActionSchema implements ActionSchemaInterface
{
    private array|null $params;
    
    private array|null $baseQuery;
    
    private array|null $baseHeader;
    
    private bool $authentication;
    
    private bool $hasBody;
        
    private string|null $description;

    private string|null $iteratorIndex;

    private string|null $afterIndex;

    private string|null $documentation;
    
    private string $resourceClass;

    private string $baseUri;
    
    private string $method;

    public function __construct(private string $action, ResourceSchemaInterface $schema)
    {
        $actionPropertyConstructor = new ActionPropertyConstructor($schema->actions[$action], $schema);
  
        $this->method = $actionPropertyConstructor->build(MethodActionProperty::class)->get();
        $this->description = $actionPropertyConstructor->build(DescriptionActionProperty::class)->get();
        $this->iteratorIndex = $actionPropertyConstructor->build(IteratorIndexActionProperty::class)->get();
        $this->afterIndex = $actionPropertyConstructor->build(AfterIndexActionProperty::class)->get();
        $this->resourceClass = $actionPropertyConstructor->build(ResourceClassActionProperty::class)->get();
        $this->hasBody = $actionPropertyConstructor->build(HasBodyActionProperty::class)->get();
        $this->authentication = $actionPropertyConstructor->build(AuthenticationActionProperty::class)->get();
        $this->baseQuery = $actionPropertyConstructor->build(BaseQueryActionProperty::class)->get();
        $this->baseHeader = $actionPropertyConstructor->build(BaseHeaderActionProperty::class)->get();
        $this->baseUri = $actionPropertyConstructor->build(BaseUriActionProperty::class)->get();
        $this->documentation = $actionPropertyConstructor->build(DocumentationActionProperty::class)->get();
        $this->params = $actionPropertyConstructor->build(ParamsActionProperty::class)->get();
    }

    public function __get($property)
    {
        if (!array_key_exists($property, get_object_vars($this))) {
            throw new Exception("Property {$property} not exists in ". __CLASS__);
        }

        return $this->{$property};
    }

    public function __isset($property)
    {
        return isset($this->{$property});
    }

    public function __toString()
    {
        return $this->action;
    }
}
