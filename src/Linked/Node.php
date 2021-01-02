<?php

namespace MMazoni\DataStructure\Linked;

class Node
{

    public function __construct(
        public $data = 0,
        public $next = null
    ) {}

    public function setData(mixed $data): void
    {
        $this->data = $data;
    }

    public function getData(): mixed
    {
        return $this->data;
    }

    public function setNext(mixed $next): void
    {
        $this->next = $next;
    }

    public function getNext(): mixed
    {
        return $this->next;
    }
}