<?php

namespace Fw\Core\Type;

use ArrayAccess;
use ArrayIterator;
use Countable;
use IteratorAggregate;
use Traversable;

class Dictionary implements IteratorAggregate, ArrayAccess, Countable
{
    private $container = [];

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this);
    }

    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    public function count(): int
    {
        return count($this->container);
    }
}