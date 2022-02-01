<?php

namespace LTL\Hubspot\Core\Response\Interfaces;

use ArrayAccess;
use Countable;

interface ResponseInterface extends Countable, ArrayAccess
{
    public function getStatus(): int;
    public function get(): ?string;
    public function getDocumentation(): ?string;
    public function toArray(): ?array;
    public function getIterator(): ?string;
    public function getAction(): string;
}
