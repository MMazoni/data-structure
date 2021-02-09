<?php

namespace MMazoni\DataStructure\Linear;

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
                    $previous?->setNext($newNode);
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
                    if ($this->head->getData() === $query) {
                        $nextNode = $currentNode->getNext();
                        $newNode->setNext($nextNode);
                    }
                    if ($currentNode === $this->tail) {
                        $this->tail = $newNode;
                    }
                    $currentNode->setNext($newNode);
                    $nextNode?->setPrev($newNode);
                    $newNode->setPrev($currentNode);
                    $this->totalNodes++;
                    break;
                }
                $currentNode = $currentNode->getNext();
                $nextNode = $currentNode->getNext();
            }
        }
    }

    public function deleteFirstNode(): bool
    {
        if ($this->head) {
            if ($this->head->getNext() !== null) {
                $this->head = $this->head->getNext();
                $this->head->setPrev(null);
            } else {
                $this->head = null;
            }
            $this->totalNodes--;
            return true;
        }
        return false;
    }

    public function deleteLastNode(): bool
    {
        if ($this->tail !== null) {
            $currentNode = $this->tail;
            if ($currentNode->getPrev() === null) {
                $this->head = null;
                $this->tail = null;
            } else {
                $previousNode = $currentNode->getPrev();
                $this->tail = $previousNode;
                $previousNode->setNext(null);
                $this->totalNodes--;
                return true;
            }
        }
        return false;
    }

    public function deleteNode(mixed $query = null): bool
    {
        if ($this->head) {
            $previous = null;
            $currentNode = $this->head;
            while ($currentNode !== null) {
                if ($currentNode->getData() === $query) {
                    if ($currentNode->getNext() === null && !is_null($previous)) {
                        $previous->setNext(null);
                    }
                    if ($currentNode->getNext() !== null && !is_null($previous)) {
                        $previous->setNext($currentNode->getNext());
                        $currentNode->getNext()->setPrev($previous);
                    }
                    if ($this->head->getData() === $query) {
                        $this->head = $currentNode->getNext();
                        $this->head->setPrev(null);
                    }
                    if ($this->tail->getData() === $query && $currentNode->getData() !== $query) {
                        $this->tail = $currentNode->getNext();
                        $this->tail->setNext(null);
                    }
                    $this->totalNodes--;
                    return true;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->getNext();
            }
        }
        return false;
    }

    public function displayForward(): void
    {
        echo "Total nodes: {$this->totalNodes}" . PHP_EOL;
        $currentNode = $this->head;
        while ($currentNode !== null) {
            echo $currentNode->getData() . PHP_EOL;
            $currentNode = $currentNode->getNext();
        }
    }

    public function displayBackward(): void
    {
        echo "Total nodes: {$this->totalNodes}" . PHP_EOL;
        $currentNode = $this->tail;
        while ($currentNode !== null) {
            echo $currentNode->getData() . PHP_EOL;
            $currentNode = $currentNode->getPrev();
        }
    }
}