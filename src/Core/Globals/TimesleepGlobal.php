<?php

namespace LTL\Hubspot\Core\Globals;

use LTL\Hubspot\Core\HubspotConfig;

abstract class TimesleepGlobal
{
    private static int $timesleep = HubspotConfig::SLEEP_SECONDS;

    public static function get(): int
    {
        return self::$timesleep;
    }

    public static function set(int $timesleep): void
    {
        self::$timesleep = $timesleep;
    }
}
