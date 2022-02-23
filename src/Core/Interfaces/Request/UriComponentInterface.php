<?php
 
namespace LTL\Hubspot\Core\Interfaces\Request;

use LTL\Hubspot\Core\Interfaces\Request\ComponentInterface;

interface UriComponentInterface extends ComponentInterface
{
    public function generate(string $baseUri, array $associativeParams, array $queries): void;
    public function get(): string;
}
