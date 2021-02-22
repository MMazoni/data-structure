<?php

namespace MMazoni\DataStructure\Linear;

class DoublyLinkedList
{
    public function __construct(public ?Node $head = null, public ?Node $tail = null, public int $totalNodes = 0)
    {
    }

    public function insertAtFront(int | string $data): void
    {
        $newNode = new Node($data);
        if ($this->head === null) {
            $this->head = &$newNode;
            $this->tail = $newNode;
            $this->totalNodes++;
            return;
        }
        $currentFirstNode = $this->head;
        $this->head = &$newNode;
        $newNode->next = $currentFirstNode;
        $currentFirstNode->previous = $newNode;
        $this->totalNodes++;
    }

    public function insertAtBack(int | string $data): void
    {
        $newNode = new Node($data);
        if ($this->head === null) {
            $this->head = &$newNode;
            $this->tail = $newNode;
            $this->totalNodes++;
            return;
        }
        $currentNode = $this->tail;
        if (!empty($currentNode)) {
            $currentNode->next = $newNode;
        }
        $newNode->previous = $currentNode;
        $this->tail = $newNode;
        $this->totalNodes++;
    }

    public function insertBeforeNode(int | string $data = null, int | string $query = null): void
    {
        $newNode = new Node($data);
        if ($this->head) {
            $previous = null;
            $currentNode = $this->head;
            while ($currentNode !== null) {
                if ($currentNode->data === $query) {
                    $newNode->next = $currentNode;
                    $currentNode->previous = $newNode;
                    if (!empty($previous)) {
                        $previous->next = $newNode;
                    }
                    $newNode->previous = $previous;
                    $this->totalNodes++;
                    break;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
    }

    public function insertAfterNode(int | string $data = null, int | string $query = null): void
    {
        $newNode = new Node($data);
        if ($this->head) {
            $nextNode = null;
            $currentNode = $this->head;
            while ($currentNode !== null) {
                if ($currentNode->data === $query) {
                    if ($nextNode !== null) {
                        $newNode->next = $nextNode;
                    }
                    if ($this->head->data === $query) {
                        $nextNode = $currentNode->next;
                        $newNode->next = $nextNode;
                    }
                    if ($currentNode === $this->tail) {
                        $this->tail = $newNode;
                    }
                    $currentNode->next = $newNode;
                    if (!empty($nextNode)) {
                        $nextNode->previous = $newNode;
                    }
                    $newNode->previous = $currentNode;
                    $this->totalNodes++;
                    break;
                }
                $currentNode = $currentNode->next;
                $nextNode = $currentNode?->next;
            }
        }
    }

    public function deleteFirstNode(): bool
    {
        if ($this->head) {
            if ($this->head->next !== null) {
                $this->head = $this->head->next;
                $this->head->previous = null;
                $this->totalNodes--;
                return true;
            }
            $this->head = null;
            $this->totalNodes--;
            return true;
        }
        return false;
    }

    public function deleteLastNode(): bool
    {
        if ($this->tail !== null) {
            $currentNode = $this->tail;
            if ($currentNode->previous != null) {
                $previousNode = $currentNode->previous;
                $this->tail = $previousNode;
                $previousNode->next = null;
                $this->totalNodes--;
                return true;
            }
            $this->head = null;
            $this->tail = null;
        }
        return false;
    }

    public function deleteNode(mixed $query = null): bool
    {
        if ($this->head) {
            $previous = null;
            $currentNode = $this->head;
            while ($currentNode !== null) {
                if ($currentNode->data === $query) {
                    if ($currentNode->next === null && !is_null($previous)) {
                        $previous->next = null;
                    }
                    if ($currentNode->next !== null && !is_null($previous)) {
                        $previous->next = $currentNode->next;
                        $currentNode->next->previous = $previous;
                    }
                    if ($this->head->data === $query && isset($currentNode->next->previous)) {
                        $this->head = $currentNode->next;
                        $this->head->previous = null;
                    }
                    if ($this->tail?->data === $query && $currentNode->data !== $query && isset($currentNode->next->next)) {
                        $this->tail = $currentNode->next;
                        $this->tail->next = null;
                    }
                    $this->totalNodes--;
                    return true;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
        return false;
    }

    public function displayForward(): void
    {
        echo "Total nodes: {$this->totalNodes}" . PHP_EOL;
        $currentNode = $this->head;
        while ($currentNode !== null) {
            echo $currentNode->data . PHP_EOL;
            $currentNode = $currentNode->next;
        }
    }

    public function displayBackward(): void
    {
        echo "Total nodes: {$this->totalNodes}" . PHP_EOL;
        $currentNode = $this->tail;
        while ($currentNode !== null) {
            echo $currentNode->data . PHP_EOL;
            $currentNode = $currentNode->previous;
        }
    }
}
