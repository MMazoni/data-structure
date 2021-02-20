<?php

namespace MMazoni\DataStructure\Linear;

class CircularLinkedList
{
    public function __construct(public ?Node $head = null, public int $totalNodes = 0)
    {
    }

    public function insertAtBack(int | string $data): void
    {
        $newNode = new Node($data);

        if ($this->head === null) {
            $this->head = &$newNode;
        } else {
            $currentNode = $this->head;
            while ($currentNode?->next !== $this->head) {
                $currentNode = $currentNode?->next;
            }
            if (!empty($currentNode)) {
                $currentNode->next = $newNode;
            }
        }
        $newNode->next = $this->head;
        $this->totalNodes++;
    }

    public function display(): void
    {
        echo "Total nodes: {$this->totalNodes}" . PHP_EOL;
        $currentNode = $this->head;
        while ($currentNode?->next !== $this->head) {
            if (isset($currentNode->data)) {
                echo $currentNode->data . PHP_EOL;
            }
            $currentNode = $currentNode?->next;
        }
        if (isset($currentNode->data)) {
            echo $currentNode->data . PHP_EOL;
        }
    }
}
