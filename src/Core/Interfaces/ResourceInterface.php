<?php

namespace LTL\Hubspot\Core\Interfaces;

use LTL\Hubspot\Core\Interfaces\MethodsListableInterface;

interface ResourceInterface extends MethodsListableInterface
{
    public function toArray(): ?array;
    public function toJson(): ?string;
    public function status(): ?int;
    public function documentation(): ?string;
}
