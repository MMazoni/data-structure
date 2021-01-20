<?php

namespace MMazoni\DataStructure\Linear;

class Node
{
    private ?Node $next = null;
    private ?Node $prev = null;

    public function __construct(private mixed $data = 0)
    {}

    public function setData(mixed $data): void
    {
        $this->data = $data;
    }

    public function getData(): mixed
    {
        return $this->data;
    }

    public function setNext(?Node $next): void
    {
        $this->next = $next;
    }

    public function getNext(): ?Node
    {
        return $this->next;
    }

    public function getPrev(): ?Node
    {
        return $this->prev;
    }

    public function setPrev(?Node $prev): void
    {
        $this->prev = $prev;
    }
}
