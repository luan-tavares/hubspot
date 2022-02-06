<?php

namespace LTL\Hubspot\Services\Curl;

abstract class CurlProgressBar
{
    private static $previousPercent;

    public static function progress($resource, $download_size, $downloaded_size, $upload_size, $uploaded_size)
    {
        self::$previousPercent = 0;


        if ($upload_size > 0) {
            $percent = intval(1000*($uploaded_size/$upload_size))/10;

            if ($percent !== self::$previousPercent) {
                self::progressBar($uploaded_size, $upload_size);
            }
        }
    }

    private static function progressBar($done, $total)
    {
        $perc = floor(($done / $total) * 100);
        $left = 100 - $perc;
        $write = sprintf("\033[0G\033[2K[%'={$perc}s>%-{$left}s] - $perc%% - $done/$total", '', '');
        fwrite(STDERR, $write);
    }
}
