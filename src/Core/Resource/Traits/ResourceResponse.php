<?php

namespace LTL\Hubspot\Core\Resource\Traits;

use LTL\Hubspot\Core\Response\Interfaces\ResponseInterface;

/**
 * @property ResponseInterface $response
 */
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

    public function getAfter(): string|int|null
    {
        $this->verifyIfResponseExists(__FUNCTION__);

        return $this->response->getAfter();
    }

    public function data(): object|array|null
    {
        $this->verifyIfResponseExists(__FUNCTION__);

        return $this->response->getResult();
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

    public function isServerError(): bool
    {
        $this->verifyIfResponseExists(__FUNCTION__);

        return $this->response->isServerError();
    }

    public function invalidEmailError(): bool
    {
        $this->verifyIfResponseExists(__FUNCTION__);

        return $this->response->isInvalidEmailError();
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

    public function headers(): array|null
    {
        $this->verifyIfResponseExists(__FUNCTION__);

        return $this->response->getHeaders();
    }

    public function empty(): bool
    {
        $this->verifyIfResponseExists(__FUNCTION__);

        return $this->response->empty();
    }

    public function count(): int
    {
        return count($this->response);
    }
}
