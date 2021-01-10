<?php

namespace MMazoni\DataStructure\Linked;

class DoublyLinkedList
{
    public function __construct(
        private ?Node $head = null,
        private ?Node $tail = null,
        private int $totalNode = 0
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
            $currentFirstNode->prev = $newNode;
        }
        $this->totalNodes++;
    }
}