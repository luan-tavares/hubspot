<?php

namespace LTL\Hubspot\Services\ArrayObject\Interfaces;

interface DeleteArrayInterface
{
    public function empty(): void;
    public function delete(int|string $key): void;
}
