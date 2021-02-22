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
            $newNode->next = $this->head;
            $this->totalNodes++;
            return;
        }
        $currentNode = $this->head;
        while ($currentNode?->next !== $this->head) {
            $currentNode = $currentNode?->next;
        }
        if (!empty($currentNode)) {
            $currentNode->next = $newNode;
        }
        $newNode->next = $this->head;
        $this->totalNodes++;
    }

    public function display(): void
    {
        echo "Total nodes: {$this->totalNodes}" . PHP_EOL;
        $currentNode = $this->head;
        while ($currentNode?->next !== $this->head) {
            $this->echoNodeData($currentNode?->data);
            $currentNode = $currentNode?->next;
        }
        $this->echoNodeData($currentNode?->data);
    }

    private function echoNodeData(?string $data): void
    {
        if (isset($data)) {
            echo $data . PHP_EOL;
        }
    }
}
