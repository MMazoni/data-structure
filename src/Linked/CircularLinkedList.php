<?php

namespace MMazoni\DataStructure\Linked;

class CircularLinkedList
{
    public function __construct(
        private ?Node $head = null,
        private int $total= 0
    )
    {}

    public function insertAtBack($data): void
    {
        $newNode = new Node($data);

        if ($this->head === null) {
            $this->head = &$newNode;
        } else {
            $currentNode = $this->head;
            while ($currentNode->getNext() !== $this->head) {
                $currentNode = $currentNode->getNext();
            }
            $currentNode->setNext($newNode);
        }
        $newNode->setNext($this->head);
        $this->totalNodes++;
    }

    public function display()
    {
        echo "Total nodes: {$this->totalNodes}" . PHP_EOL;
        $currentNode = $this->head;
        while ($currentNode->getNext() !== $this->head) {
            echo $currentNode->getData() . PHP_EOL;
            $currentNode = $currentNode->getNext();
        }
        if ($currentNode) {
            echo $currentNode->getData() . PHP_EOL;
        }
    }
}