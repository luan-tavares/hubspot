<?php
 
namespace LTL\Hubspot\Core\Interfaces\Request;

use LTL\Hubspot\Core\Interfaces\Request\RequestInterface;
use LTL\Hubspot\Core\Request\RequestCurlCaller;
use LTL\Hubspot\Core\Interfaces\Schemas\ActionSchemaInterface;

interface RequestActionDefinitionInterface
{
    public static function finish(RequestInterface $request, ActionSchemaInterface $actionSchema, array $arguments): RequestCurlCaller;
}
