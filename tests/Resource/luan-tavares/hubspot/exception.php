<?php

use LTL\Hubspot\Exceptions\HubspotApiException;
use LTL\Hubspot\Resources\V3\ContactHubspot;

try {
    ContactHubspot::limit([]);
} catch (HubspotApiException $exception) {
    return $exception;
}
