<?php


if (!function_exists('hubspotKey')) {
    function hubspotKey(string $apikey)
    {
        \LTL\Hubspot\Hubspot::setGlobalApikey($apikey);
    }
}



if (!function_exists('hubspotEnv')) {
    function hubspotEnv($file)
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

if (!function_exists('removeFromAnonymousClassName')) {
    function removeFromAnonymousClassName(string $className)
    {
        return preg_replace('/\@anonymous(.*)\$\d/', '', $className);
    }
}
