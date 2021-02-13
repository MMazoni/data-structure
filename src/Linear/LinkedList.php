<?php

namespace MMazoni\DataStructure\Linear;

class LinkedList implements \Iterator
{
    private int $totalNodes = 0;
    private ?Node $currentNode = null;
    private int $currentPosition = 0;

    public function __construct(private ?Node $head = null)
    {}

    public function insertAtBack(mixed $data): void
    {
        $newNode = new Node($data);

        if ($this->head === null) {
            $this->head = &$newNode;
        } else {
            $currentNode = $this->head;
            while ($currentNode?->getNext() !== null) {
                $currentNode = $currentNode?->getNext();
            }
            $currentNode?->setNext($newNode);
        }
        $this->totalNodes++;
    }

    public function insertAtFront(mixed $data): void
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

    public function display(): void
    {
        echo "Total nodes: {$this->totalNodes}" . PHP_EOL;
        $currentNode = $this->head;
        while (!is_null($currentNode)) {
            echo $currentNode->getData() . PHP_EOL;
            $currentNode = $currentNode->getNext();
        }
    }

    public function searchNode(mixed $data): Node|bool
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

    public function insertBeforeNode(mixed $data = null, mixed $query = null): void
    {
        $newNode = new Node($data);
        if ($this->head) {
            $previous = null;
            $currentNode = $this->head;
            while ($currentNode !== null) {
                if ($currentNode->getData() === $query) {
                    $newNode->setNext($currentNode);
                    $previous?->setNext($newNode);
                    $this->totalNodes++;
                    break;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->getNext();
            }
        }
    }

    public function insertAfterNode(mixed $data = null, mixed $query = null): void
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
                $nextNode = $currentNode?->getNext();
            }
        }
    }

    public function deleteFirstNode(): bool
    {
        if ($this->head) {
            if ($this->head->getNext() !== null) {
                $this->head = $this->head->getNext();
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
        if ($this->head !== null) {
            $currentNode = $this->head;
            if ($currentNode->getNext() === null && $this->totalNodes > 1) {
                $this->head = null;
                return false;
            }
            if ($currentNode->getNext() !== null) {
                $previousNode = null;
                while ($currentNode?->getNext() !== null) {
                    $previousNode = $currentNode;
                    $currentNode = $currentNode?->getNext();
                }

                $previousNode?->setNext(null);
            }
            if ($currentNode?->getNext() === null && $this->totalNodes === 1) {
                $this->head = null;
            }

            $this->totalNodes--;
            return true;
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
                    }
                    if ($this->head->getData() === $query) {
                        $this->head = $currentNode->getNext();
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

    public function reverse(): void
    {
        if ($this->head !== null) {
            if ($this->head->getNext() !== null) {
                $reversedList = null;
                $next = null;
                $currentNode = $this->head;
                while ($currentNode !== null) {
                    $next = $currentNode->getNext();
                    $currentNode->setNext($reversedList);
                    $reversedList = $currentNode;
                    $currentNode = $next;
                }
                $this->head = $reversedList;
            }
        }
    }

    public function getNthNode(int $position = 0): ?Node
    {
        $count = 1;
        if ($this->head !== null) {
            $currentNode = $this->head;
            while ($currentNode !== null) {
                if ($count === $position) {
                    return $currentNode;
                }
                $count++;
                $currentNode = $currentNode->getNext();
            }
        }
        return null;
    }

    // Iterator interface implementation methods

    public function current()
    {
        return $this->currentNode?->getData();
    }

    public function next()
    {
        $this->currentPosition++;
        $this->currentNode = $this->currentNode?->getNext();
    }

    public function key()
    {
        return $this->currentPosition;
    }

    public function rewind()
    {
        $this->currentPosition = 0;
        $this->currentNode = $this->head;
    }

    public function valid()
    {
        return $this->currentNode !== null;
    }
}
