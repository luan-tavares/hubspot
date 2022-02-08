<?php

namespace LTL\Hubspot\Core\Resource\Traits;

trait ResourceEnumerable
{
    public function each(callable $callback): void
    {
        foreach ($this as $key => $item) {
            $callback($item, $key);
        }
    }

    public function map(callable $callback): array
    {
        $result = [];
        foreach ($this as $key => $item) {
            $result[] = $callback($item, $key);
        }

        return $result;
    }

    public function mapWithKeys(callable $callback): array
    {
        $result = [];
        
        foreach ($this as $key => $item) {
            $row = $callback($item, $key);
            foreach ($row as $key => $value) {
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
                $result[] = $item;
            }
        }

        return $result;
    }

   
    public function reduce(callable $callback, $initial = null)
    {
        $result = $initial;

        foreach ($this as $key => $value) {
            $result = $callback($result, $value, $key);
        }

        return $result;
    }
}
