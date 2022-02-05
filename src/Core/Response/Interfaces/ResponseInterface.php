<?php

namespace LTL\Hubspot\Core\Response\Interfaces;

interface ResponseInterface
{
    public function getStatus(): int;
    public function get(): ?string;
    public function getDocumentation(): ?string;
    public function destroy(): void;
}
