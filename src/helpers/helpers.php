<?php

use LTL\Hubspot\Core\Container;

if (!function_exists('hubspotKey')) {
    /**
     * Undocumented function
     *
     * @param string $apikey
     * @return void
     */
    function hubspotKey(string $apikey)
    {
        Container::apikey($apikey);
    }
}

if (!function_exists('container')) {
    /**
     * Get Singleton Class
     *
     * @param string $class
     * @return object
     */
    function container(string $class): object
    {
        return Container::singleton($class);
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
            } else {
                $a[$name] = null;
            }
        }

        fclose($env);

        return $a;
    }
}
