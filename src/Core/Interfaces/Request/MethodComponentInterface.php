<?php
 
namespace LTL\Hubspot\Core\Interfaces\Request;

use LTL\Hubspot\Core\Interfaces\Request\ComponentInterface;

interface MethodComponentInterface extends ComponentInterface
{
    public function set(string $method): void;
    public function get(): string;
}
