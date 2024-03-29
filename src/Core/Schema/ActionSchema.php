<?php

namespace LTL\Hubspot\Core\Schema;

use LTL\Hubspot\Core\Schema\ActionProperties\ActionMethodActionProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\AfterIndexActionProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\AuthenticationActionProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\BaseHeaderActionProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\BaseQueryActionProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\BaseUriActionProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\BodyTypesProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\DescriptionActionProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\DocumentationActionProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\HandlerActionProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\HasBodyActionProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\IteratorIndexActionProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\MethodActionProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\ParamsActionProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\QueryAsParamProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\ResourceClassActionProperty;
use LTL\Hubspot\Core\Schema\Interfaces\ActionSchemaInterface;
use LTL\Hubspot\Exceptions\HubspotApiException;

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
 * @property string|null $handler
 * @property array|null $queryAsParam
 */
class ActionSchema implements ActionSchemaInterface
{
    #[ParamsActionProperty]
    private array|null $params;

    #[QueryAsParamProperty]
    private array|null $queryAsParam;
    
    #[BaseQueryActionProperty]
    private array|null $baseQuery;
    
    #[BaseHeaderActionProperty]
    private array|null $baseHeader;
    
    #[AuthenticationActionProperty]
    private bool $authentication;
    
    #[HasBodyActionProperty]
    private bool $hasBody;
     
    #[DescriptionActionProperty]
    private string|null $description;

    #[IteratorIndexActionProperty]
    private string|null $iteratorIndex;

    #[AfterIndexActionProperty]
    private string|null $afterIndex;

    #[DocumentationActionProperty]
    private string|null $documentation;
    
    #[ResourceClassActionProperty]
    private string $resourceClass;

    #[BaseUriActionProperty]
    private string $baseUri;
    
    #[MethodActionProperty]
    private string $method;

    #[ActionMethodActionProperty]
    private string $action;

    #[HandlerActionProperty]
    private string|null $handler;

    #[BodyTypesProperty]
    private array|null $bodyTypes;

    /**
     * \LTL\Hubspot\Factories\ActionSchemaFactory
     */
    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public function __get($property)
    {
        if (!array_key_exists($property, get_object_vars($this))) {
            throw new HubspotApiException("Property {$property} not exists in ". __CLASS__);
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
