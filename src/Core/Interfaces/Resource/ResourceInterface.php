<?php

namespace LTL\Hubspot\Core\Interfaces\Resource;

use LTL\Hubspot\Interfaces\ArrayableInterface;
use LTL\Hubspot\Interfaces\EnumerableInterface;
use LTL\Hubspot\Interfaces\JsonableInterface;
use LTL\ListMethods\PublicMethods\Interfaces\PublicMethodsListableInterface;

interface ResourceInterface extends PublicMethodsListableInterface, ArrayableInterface, EnumerableInterface, JsonableInterface
{
    public function status(): int|null;
    public function documentation(): string|null;
    public function headers(): array|null;
    public function error(): bool;
    public static function setGlobalApikey(string $apikey): void;
}
