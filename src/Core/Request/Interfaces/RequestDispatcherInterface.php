<?php
 
namespace LTL\Hubspot\Core\Request\Interfaces;

use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;
use LTL\Hubspot\Services\Curl\Curl;

interface RequestDispatcherInterface
{
    public static function execute(ResourceInterface $resource, string $action, array $arguments): Curl;
}
