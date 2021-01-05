<?php

namespace MMazoni\DataStructure\Linked;

class LinkedList
{
    public function __construct(
        private $head = null,
        private int $totalNodes = 0
    ) {}

    public function insertAtBack($data): void
    {
        $newNode = new Node();
        $newNode->setData($data);

        if ($this->head === null) {
            $this->head = &$newNode;
        } else {
            $currentNode = $this->head;
            while ($currentNode->getNext() !== null) {
                $currentNode = $currentNode->getNext();
            }
            $currentNode->setNext($newNode);
        }
        $this->totalNodes++;
    }

    public function insertAtFront($data): void
    {
        $newNode = new Node($data);
        if ($this->head === null) {
            $this->head = &$newNode;
        } else {
            $currentFirstNode = $this->head;
            $this->head = &$newNode;
            $newNode->setNext($currentFirstNode);
        }
        $this->totalNodes++;
    }

    public function display()
    {
        echo "Total nodes: {$this->totalNodes}" . PHP_EOL;
        $currentNode = $this->head;
        while (!is_null($currentNode)) {
            echo $currentNode->getData() . PHP_EOL;
            $currentNode = $currentNode->getNext();
        }
    }

    public function searchNode($data): mixed
    {
        if ($this->head) {
            $currentNode = $this->head;
            while ($currentNode !== null) {
                if ($currentNode->getData() === $data) {
                    return $currentNode;
                }
                $currentNode = $currentNode->getNext();
            }
        }
        return false;
    }

    public function head(): ?Node
    {
        return $this->head;
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
                if ($currentNode->data === $query) {
                    $newNode->setNext($currentNode);
                    $previous->setNext($newNode);
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
                    $currentNode->setNext($newNode);
                    $this->totalNodes++;
                    break;
                }
                $currentNode = $currentNode->getNext();
                $nextNode = $currentNode->getNext();
            }
        }
    }
}
