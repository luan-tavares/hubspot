<?php

namespace LTL\Hubspot\Core\Response\Interfaces;

use LTL\Hubspot\Core\Response\ResponseObject;

interface ResponseInterface
{
    public function getStatus(): int;
    public function get(): ?string;
    public function getDocumentation(): ?string;
    public function destroy(): void;
    public function getObject(): ResponseObject;
}
