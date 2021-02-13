<?php

namespace MMazoni\DataStructure\Abstraction;

use UnderflowException;
use MMazoni\DataStructure\Linear\Stack;
use MMazoni\DataStructure\Linear\LinkedList;

class BooksList implements Stack
{
    private LinkedList $stack;

    public function __construct()
    {
        $this->stack = new LinkedList();
    }

    public function pop(): string
    {
        if ($this->isEmpty() === true) {
            throw new UnderflowException('Stack is empty');
        }
        $lastItem = $this->top();
        $this->stack->deleteLastNode();
        return $lastItem;
    }

    public function push(string $newItem): void
    {
        $this->stack->insertAtBack($newItem);
    }

    public function top(): string
    {
        return $this->stack->getNthNode($this->stack->totalNodes())->getData();
    }

    public function isEmpty(): bool
    {
        return $this->stack->totalNodes() === 0;
    }
}
