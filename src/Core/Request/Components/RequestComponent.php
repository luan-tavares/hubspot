<?php

namespace LTL\Hubspot\Core\Request\Components;

use LTL\Hubspot\Core\Interfaces\Request\RequestInterface;
use LTL\Observer\Interfaces\SubjectInterface;
use LTL\Observer\Traits\SubjectTrait;

abstract class RequestComponent implements SubjectInterface
{
    use SubjectTrait;

    private array $items = [];

    protected RequestInterface|null $request;

    public function __construct(RequestInterface|null $request = null)
    {
        $this->request = $request;
    }

    private function __clone()
    {
    }

    public function boot(): void
    {
        $this->initConfig();
    }

    protected function initConfig(): void
    {
    }

    public function request(): RequestInterface|null
    {
        return $this->request;
    }

    public function all(): array
    {
        return $this->items;
    }

    public function delete(int|string $key): void
    {
        unset($this->items[$key]);
    }

    public function addArrayAfter(array|null $array): self
    {
        if (is_null($array)) {
            return $this;
        }

        $this->items = $this->addArray(array_merge($this->items, $array));

        return $this;
    }

    public function addArrayBefore(array|null $array): self
    {
        if (is_null($array)) {
            return $this;
        }
        
        $this->items = $this->addArray(array_merge($array, $this->items));

        return $this;
    }

    private function addArray(array|null $mergedArray): array
    {
        return array_filter($mergedArray, function ($item) {
            return !is_null($item);
        });
    }
  
    public function addNotNull(string $name, string|int|array|bool|null $value): self
    {
        if (is_null($value)) {
            return $this;
        }

        return $this->add($name, $value);
    }

    public function add(string $name, string|int|array|bool|null $value = null): self
    {
        if (is_null($value)) {
            $value = '';
        }

        $this->items[$name] = $value;

        return $this;
    }

    public function value(string $index): int|null|string|array|bool
    {
        return @$this->items[$index];
    }
}