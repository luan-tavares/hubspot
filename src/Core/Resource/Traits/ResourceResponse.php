<?php

namespace LTL\Hubspot\Core\Resource\Traits;

trait ResourceResponse
{
    public function toArray(): array
    {
        $this->verifyIfResponseExists(__FUNCTION__);

        return $this->response->toArray();
    }
  
    public function toJson(): string
    {
        $this->verifyIfResponseExists(__FUNCTION__);

        return $this->response->toJson();
    }
  
    public function status(): int
    {
        $this->verifyIfResponseExists(__FUNCTION__);

        return $this->response->getStatus();
    }

    public function isMultiStatus(): bool
    {
        $this->verifyIfResponseExists(__FUNCTION__);

        return $this->response->isMultiStatus();
    }

    public function isTooManyRequestsError(): bool
    {
        $this->verifyIfResponseExists(__FUNCTION__);

        return $this->response->isTooManyRequestsError();
    }

    public function error(): bool
    {
        $this->verifyIfResponseExists(__FUNCTION__);

        return $this->response->hasErrors();
    }
 
    public function documentation(): string|null
    {
        $this->verifyIfResponseExists(__FUNCTION__);

        return $this->response->getDocumentation();
    }

    public function headers(): array|null
    {
        $this->verifyIfResponseExists(__FUNCTION__);

        return $this->response->getHeaders();
    }
}