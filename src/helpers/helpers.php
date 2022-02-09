<?php


if (!function_exists('hubspotKey')) {
    function hubspotKey(string $apikey)
    {
        \LTL\Hubspot\Containers\ApikeyContainer::store($apikey);
    }
}



if (!function_exists('envDefine')) {
    function envDefine($file)
    {
        $env = fopen($file, 'r');

        $a = [];

        while (!feof($env)) {
            $explodeLine = explode('=', fgets($env));

            $name = $explodeLine[0];

            if (isset($explodeLine[1])) {
                $a[$name] = trim($explodeLine[1]);
                continue;
            }
            $a[$name] = null;
        }

        fclose($env);

        return $a;
    }
}
