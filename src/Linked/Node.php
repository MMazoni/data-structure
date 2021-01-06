<?php

namespace MMazoni\DataStructure\Linked;

class Node
{

    public function __construct(
        public mixed $data = 0,
        public ?Node $next = null
    ) {}

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
}
