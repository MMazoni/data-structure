<?php

namespace MMazoni\DataStructure\Abstraction;

use MMazoni\DataStructure\Stack\Stack;
use OverflowException;
use UnderflowException;

class Books implements Stack
{
    public function __construct(
        private int $limit = 20,
        private array $stack = []
    )
    {}

    public function pop(): string
    {
        if ($this->isEmpty() === true) {
            throw new UnderflowException('Stack is empty');
        }
        return array_pop($this->stack);
    }

    public function push(string $newItem): void
    {
        if (count($this->stack) >= $this->limit) {
            throw new OverflowException('Stack is full');
        }
        array_push($this->stack, $newItem);
    }

    public function top(): string
    {
        return end($this->stack);
    }

    public function isEmpty(): bool
    {
        return empty($this->stack);
    }
}
