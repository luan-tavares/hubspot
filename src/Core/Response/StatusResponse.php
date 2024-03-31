<?php

namespace LTL\Hubspot\Core\Response;

use LTL\Hubspot\Core\HubspotConfig;

class StatusResponse
{
    private bool $isInvalidEmail;
    
    public function __construct(private int $status, string $raw)
    {
        $this->isInvalidEmail = str_contains($raw, 'INVALID_EMAIL');
    }

    public function get(): int
    {
        return $this->status;
    }

    public function hasErrors(): bool
    {
        return ($this->status < 200 || $this->status >= 300);
    }

    public function isMultiStatus(): bool
    {
        return ($this->status === HubspotConfig::MULTI_STATUS_CODE);
    }

    public function isTooManyRequestsError(): bool
    {
        return ($this->status === HubspotConfig::TOO_MANY_REQUESTS_ERROR_CODE);
    }

    public function isInvalidEmailError(): bool
    {
        if (!$this->hasErrors()) {
            return false;
        }

        return $this->isInvalidEmail;
    }
}
