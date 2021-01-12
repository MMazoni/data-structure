<?php

namespace MMazoni\DataStructure\Linked;

class DoublyLinkedList
{
    public function __construct(
        private ?Node $head = null,
        private ?Node $tail = null,
        private int $totalNodes = 0
    )
    {}

    public function insertAtFront($data): void
    {
        $newNode = new Node($data);
        if ($this->head === null) {
            $this->head = &$newNode;
            $this->tail = $newNode;
        } else {
            $currentFirstNode = $this->head;
            $this->head = &$newNode;
            $newNode->setNext($currentFirstNode);
            $currentFirstNode->setPrev($newNode);
        }
        $this->totalNodes++;
    }

    public function insertAtBack(mixed $data): void
    {
        $newNode = new Node($data);
        if ($this->head === null) {
            $this->head = &$newNode;
            $this->tail = $newNode;
        } else {
            $currentNode = $this->tail;
            $currentNode->setNext($newNode);
            $newNode->setPrev($currentNode);
            $this->tail = $newNode;
        }
        $this->totalNodes++;
    }

    public function head(): ?Node
    {
        return $this->head;
    }

    public function totalNodes(): int
    {
        return $this->totalNodes;
    }
}