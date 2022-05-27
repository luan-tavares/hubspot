<?php
 
namespace LTL\Hubspot\Core\Interfaces\Request;

use LTL\Hubspot\Core\Interfaces\Request\ComponentInterface;
use LTL\Hubspot\Core\Interfaces\Schemas\ActionSchemaInterface;

interface UriComponentInterface extends ComponentInterface
{
    public function create(ActionSchemaInterface $actionSchema, array $arguments): void;
    public function get(): string;
}
