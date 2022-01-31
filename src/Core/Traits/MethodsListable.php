<?php

namespace LTL\Hubspot\Core\Traits;

use LTL\Hubspot\Services\PublicMethods\PublicMethods;

trait MethodsListable
{
    private static $methods;

    public function getMethods(): array
    {
        if (is_null(self::$methods)) {
            self::$methods = PublicMethods::list(self::class);
        }

        return self::$methods;
    }
}
