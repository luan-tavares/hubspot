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
use LTL\Hubspot\Core\Schema\ActionProperties\HandlerActionProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\HasBodyActionProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\IteratorIndexActionProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\MethodActionProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\ObjectIteratorProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\ObjectProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\ParamsActionProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\QueryAsParamProperty;
use LTL\Hubspot\Core\Schema\ActionProperties\ResourceClassActionProperty;
use LTL\Hubspot\Exceptions\HubspotApiException;

class ActionSchema
{
    #[ParamsActionProperty]
    public readonly array|null $params;

    #[QueryAsParamProperty]
    public readonly array|null $queryAsParam;
    
    #[BaseQueryActionProperty]
    public readonly array|null $baseQuery;
    
    #[BaseHeaderActionProperty]
    public readonly array|null $baseHeader;
    
    #[AuthenticationActionProperty]
    public readonly bool $authentication;
    
    #[HasBodyActionProperty]
    public readonly bool $hasBody;
     
    #[DescriptionActionProperty]
    public readonly string|null $description;

    #[IteratorIndexActionProperty]
    public readonly string|null $iteratorIndex;

    #[AfterIndexActionProperty]
    public readonly string|null $afterIndex;
    
    #[ResourceClassActionProperty]
    public readonly string $resourceClass;

    #[BaseUriActionProperty]
    public readonly string $baseUri;
    
    #[MethodActionProperty]
    public readonly string $method;

    #[ActionMethodActionProperty]
    public readonly string $action;

    #[HandlerActionProperty]
    public readonly string|null $handler;

    #[BodyTypesProperty]
    public readonly array|null $bodyTypes;

    #[ObjectProperty]
    public readonly string|null $object;

    #[ObjectIteratorProperty]
    public readonly string|null $objectIterator;

    private function __construct()
    {
        /**
         * \LTL\Hubspot\Factories\ActionSchemaFactory
         */
    }

    private function __clone()
    {
    }

    public function __toString()
    {
        return $this->action;
    }
}
