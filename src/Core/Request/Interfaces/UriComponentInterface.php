<?php
 
namespace LTL\Hubspot\Core\Request\Interfaces;

use LTL\Hubspot\Core\Request\Interfaces\ComponentInterface;

interface UriComponentInterface extends ComponentInterface
{
    public function generate(string $baseUri, array $associativeParams, array $queries): void;
    public function get(): string;
}
