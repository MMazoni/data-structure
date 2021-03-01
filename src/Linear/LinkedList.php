<?php

namespace MMazoni\DataStructure\Linear;

class LinkedList implements \Iterator
{
    public int $totalNodes = 0;
    private ?Node $currentNode = null;
    private int $currentPosition = 0;

    public function __construct(public ?Node $head = null)
    {
    }

    public function insertAtBack(int | string $data): void
    {
        $newNode = new Node($data);

        if ($this->head === null) {
            $this->head = &$newNode;

            $this->totalNodes++;
            return;
        }
        $currentNode = $this->head;
        while ($currentNode?->next !== null) {
            $currentNode = $currentNode?->next;
        }
        if (!empty($currentNode)) {
            $currentNode->next = $newNode;
        }

        $this->totalNodes++;
    }

    public function insertAtFront(int | string $data): void
    {
        $newNode = new Node($data);
        if ($this->head === null) {
            $this->head = &$newNode;

            $this->totalNodes++;
            return;
        }
        $currentFirstNode = $this->head;
        $this->head = &$newNode;
        $newNode->next = $currentFirstNode;

        $this->totalNodes++;
    }

    public function display(): void
    {
        echo "Total nodes: {$this->totalNodes}" . PHP_EOL;
        $currentNode = $this->head;
        while (!is_null($currentNode) && isset($currentNode->data)) {
            echo $currentNode->data . PHP_EOL;
            $currentNode = $currentNode->next;
        }
    }

    public function searchNode(int | string $data): Node | bool
    {
        if ($this->head) {
            $currentNode = $this->head;
            return $this->searchedNode($currentNode, $data) ?? false;
        }
        return false;
    }

    private function searchedNode(Node $currentNode, int | string $data): ?Node
    {
        while ($currentNode !== null) {
            if ($currentNode->data === $data) {
                return $currentNode;
            }
            $currentNode = $currentNode->next;
        }
        return $currentNode;
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
                    if (!empty($previous)) {
                        $previous->next = $newNode;
                    }
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
                    $currentNode->next = $newNode;
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
        if ($this->head !== null) {
            $currentNode = $this->head;
            if ($currentNode->next === null && $this->totalNodes > 1) {
                $this->head = null;
                return false;
            }
            if ($currentNode->next !== null) {
                $previousNode = null;
                while ($currentNode?->next !== null) {
                    $previousNode = $currentNode;
                    $currentNode = $currentNode?->next;
                }
                if (!empty($previousNode)) {
                    $previousNode->next = null;
                }
            }
            if ($currentNode?->next === null && $this->totalNodes === 1) {
                $this->head = null;
            }

            $this->totalNodes--;
            return true;
        }
        return false;
    }

    public function deleteNode(int | string $query = null): bool
    {
        if ($this->head) {
            $previous = null;
            $currentNode = $this->head;
            return $this->findToDelete($currentNode, $previous, $query);
        }
        return false;
    }

    private function findToDelete(Node $currentNode, ?Node $previous, int | string | null $query): bool
    {
        while ($currentNode !== null) {
            if ($currentNode->data === $query) {
                return $this->delete($currentNode, $previous, $query);
            }
            $previous = $currentNode;
            $currentNode = $currentNode->next;
        }
        return false;
    }

    private function delete(Node $currentNode, ?Node $previous, int | string | null $query): bool
    {
        if ($currentNode->next === null && !is_null($previous)) {
            $previous->next = null;
        }
        if ($currentNode->next !== null && !is_null($previous)) {
            $previous->next = $currentNode->next;
        }
        if ($this->head?->data === $query) {
            $this->head = $currentNode->next;
        }
        $this->totalNodes--;
        return true;
    }

    public function reverse(): void
    {
        if ($this->head !== null) {
            $this->reverseListIfCan();
        }
    }

    private function reverseListIfCan(): void
    {
        if ($this->head?->next !== null) {
            $reversedList = null;
            $next = null;
            $currentNode = $this->head;
            $this->doReverse($currentNode, $next, $reversedList);
        }
    }

    private function doReverse(?Node $currentNode, ?Node $next, ?Node $reversedList): void
    {
        while ($currentNode !== null) {
            $next = $currentNode->next;
            $currentNode->next = $reversedList;
            $reversedList = $currentNode;
            $currentNode = $next;
        }
        $this->head = $reversedList;
    }

    public function getNthNode(int $position = 0): ?Node
    {
        $count = 1;
        if ($this->head !== null) {
            $currentNode = $this->head;
            return $this->iterateToFindNode($currentNode, $count, $position);
        }
        return null;
    }

    private function iterateToFindNode(Node $currentNode, int $count, int $position): ?Node
    {
        while ($currentNode !== null) {
            if ($count === $position) {
                return $currentNode;
            }
            $count++;
            $currentNode = $currentNode->next;
        }
        return null;
    }

    // Iterator interface implementation methods

    public function current()
    {
        return $this->currentNode?->data;
    }

    public function next()
    {
        $this->currentPosition++;
        $this->currentNode = $this->currentNode?->next;
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
