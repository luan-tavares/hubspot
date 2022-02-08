<?php
 
namespace LTL\Hubspot\Core\Request\Interfaces;

use LTL\Hubspot\Core\Request\Interfaces\RequestInterface;
use LTL\Hubspot\Core\Request\RequestCurlCaller;
use LTL\Hubspot\Core\Schemas\Interfaces\ActionSchemaInterface;

interface RequestActionDefinitionInterface
{
    public static function finish(RequestInterface $request, ActionSchemaInterface $actionSchema, array $arguments): RequestCurlCaller;
}
