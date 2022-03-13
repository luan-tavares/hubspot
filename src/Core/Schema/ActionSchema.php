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
    private DescriptionActionProperty $description;

    private IteratorIndexActionProperty $iteratorIndex;

    private AfterIndexActionProperty $afterIndex;

    private ResourceClassActionProperty $resourceClass;

    private MethodActionProperty $method;

    private BaseUriActionProperty $baseUri;

    private DocumentationActionProperty $documentation;
  
    private ParamsActionProperty $params;

    private BaseQueryActionProperty $baseQuery;

    private BaseHeaderActionProperty $baseHeader;

    private AuthenticationActionProperty $authentication;

    private HasBodyActionProperty $hasBody;

    public function __construct(private string $action, ResourceSchemaInterface $schema)
    {
        $actionPropertyConstructor = new ActionPropertyConstructor($schema->actions[$action], $schema);
  
        $this->method = $actionPropertyConstructor->build(MethodActionProperty::class);
        $this->description = $actionPropertyConstructor->build(DescriptionActionProperty::class);
        $this->iteratorIndex = $actionPropertyConstructor->build(IteratorIndexActionProperty::class);
        $this->afterIndex = $actionPropertyConstructor->build(AfterIndexActionProperty::class);
        $this->resourceClass = $actionPropertyConstructor->build(ResourceClassActionProperty::class);
        $this->hasBody = $actionPropertyConstructor->build(HasBodyActionProperty::class);
        $this->authentication = $actionPropertyConstructor->build(AuthenticationActionProperty::class);
        $this->baseQuery = $actionPropertyConstructor->build(BaseQueryActionProperty::class);
        $this->baseHeader = $actionPropertyConstructor->build(BaseHeaderActionProperty::class);
        $this->baseUri = $actionPropertyConstructor->build(BaseUriActionProperty::class);
        $this->documentation = $actionPropertyConstructor->build(DocumentationActionProperty::class);
        $this->params = $actionPropertyConstructor->build(ParamsActionProperty::class);
    }

    public function __get($property)
    {
        if (!array_key_exists($property, get_object_vars($this))) {
            throw new Exception("Property {$property} not exists in ". __CLASS__);
        }

        $value = $this->{$property};

        if ($value instanceof ActionProperty) {
            return $value->get();
        }

        return $value;
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
