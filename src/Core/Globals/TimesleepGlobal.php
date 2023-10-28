<?php

namespace LTL\Hubspot\Core\Globals;

use LTL\Hubspot\Core\HubspotConfig;

abstract class TimesleepGlobal
{
    private static int $timesleep = HubspotConfig::SLEEP_SECONDS;

    public static function get(int|null $timesleep = null): int
    {
        if (!is_null($timesleep)) {
            self::$timesleep = $timesleep;
        }

        return self::$timesleep;
    }
}
