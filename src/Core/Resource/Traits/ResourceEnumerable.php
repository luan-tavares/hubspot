<?php

namespace LTL\Hubspot\Core\Resource\Traits;

use Closure;
use LTL\Hubspot\Core\Resource\Interfaces\ResourceInterface;

trait ResourceEnumerable
{
    public function each(callable $callback): void
    {
        foreach ($this as $key => $item) {
            $callback($item, $key);
        }

        return;
    }

    /**
     * @param Closure(object $resource, int $key): mixed $callback
     *
     */
    public function map(callable $callback): array
    {
        $result = [];

        /**
         * @var ResourceInterface $this
         */
        foreach ($this as $key => $item) {
            $result[] = $callback($item, $key);
        }

        return $result;
    }

    public function mapAndFilter(callable $callback): array
    {
        $result = [];
        foreach ($this as $key => $item) {
            $return  = $callback($item, $key);

            if ($return === null) {
                continue;
            }

            $result[] = $return;
        }

        return $result;
    }

    public function mapWithKeys(callable $callback): array
    {
        $result = [];
        
        foreach ($this as $key => $item) {
            $return = $callback($item, $key);
            foreach ($return as $key => $value) {
                $result[$key] = $value;
            }
        }

        return $result;
    }

    public function mapWithKeysAndFilter(callable $callback): array
    {
        $result = [];
        
        foreach ($this as $key => $item) {
            $return  = $callback($item, $key);

            if ($return === null) {
                continue;
            }
            foreach ($return as $key => $value) {
                $result[$key] = $value;
            }
        }

        return $result;
    }

    public function filter(callable $callback): array
    {
        $result = [];
        foreach ($this as $key => $item) {
            if ($callback($item, $key)) {
                $result[$key] = $item;
            }
        }

        return $result;
    }

   
    public function reduce(callable $callback, $initial = null): mixed
    {
        $result = $initial;

        foreach ($this as $key => $value) {
            $result = $callback($result, $value, $key);
        }

        return $result;
    }
}
