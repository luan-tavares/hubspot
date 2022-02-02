<?php
 
namespace LTL\Hubspot\Core\Request\Interfaces;

use LTL\Hubspot\Core\Request\Interfaces\ComponentInterface;

interface BodyComponentInterface extends ComponentInterface
{
    public function add(?array $body): void;
    public function get(): ?array;
}
