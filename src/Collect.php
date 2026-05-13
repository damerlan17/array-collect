<?php

namespace Collect;

class Collect
{
    private array $array = [];

    public function __construct(array $array = [])
    {
        $this->array = $array;
    }

    public function get($key = null)
    {
        return $key === null ? $this->array : ($this->array[$key] ?? null);
    }

    public function first()
    {
        return $this->array[array_key_first($this->array)] ?? null;
    }

    public function count(): int
    {
        return count($this->array);
    }

    public function toArray(): array
    {
        return $this->array;
    }

    public function map(callable $callback): self
    {
        return new self(array_map($callback, $this->array));
    }

    public function each(callable $callback, ...$args): self
    {
        foreach ($this->array as $key => $item) {
            $callback($item, $key, ...$args);
        }
        return $this;
    }

    public function push($value, $key = null): self
    {
        if ($key === null) {
            $this->array[] = $value;
        } else {
            $this->array[$key] = $value;
        }
        return $this;
    }

    public function filter(callable $callback): self
    {
        return new self(array_filter($this->array, $callback, ARRAY_FILTER_USE_BOTH));
    }

    // Добавьте другие нужные методы по желанию
}