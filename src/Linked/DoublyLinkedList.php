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

    public function tail(): ?Node
    {
        return $this->tail;
    }

    public function totalNodes(): int
    {
        return $this->totalNodes;
    }

    public function insertBeforeNode($data = null, $query = null): void
    {
        $newNode = new Node($data);
        if ($this->head) {
            $previous = null;
            $currentNode = $this->head;
            while ($currentNode !== null) {
                if ($currentNode->getData() === $query) {
                    $newNode->setNext($currentNode);
                    $currentNode->setPrev($newNode);
                    $previous->setNext($newNode);
                    $newNode->setPrev($previous);
                    $this->totalNodes++;
                    break;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->getNext();
            }
        }
    }

    public function insertAfterNode($data = null, $query = null): void
    {
        $newNode = new Node($data);
        if ($this->head) {
            $nextNode = null;
            $currentNode = $this->head;
            while ($currentNode !== null) {
                if ($currentNode->getData() === $query) {
                    if ($nextNode !== null) {
                        $newNode->setNext($nextNode);
                    }
                    if ($currentNode === $this->tail) {
                        $this->tail = $newNode;
                    }
                    $currentNode->setNext($newNode);
                    $nextNode->setPrev($newNode);
                    $newNode->setPrev($currentNode);
                    $this->totalNodes++;
                    break;
                }
                $currentNode = $currentNode->getNext();
                $nextNode = $currentNode->getNext();
            }
        }
    }

}