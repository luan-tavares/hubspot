<?php

namespace LTL\Hubspot\Interfaces;

interface JsonableInterface
{
    public function toJson(): string|null;
}
