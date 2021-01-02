<?php

namespace MMazoni\DataStructure\Linked;

class LinkedList
{
    public function __construct(
        private mixed $head = null,
        private int $totalNodes = 0
    ) {}

    public function insertAtBack($data): bool
    {
        $newNode = new Node();
        $newNode->setData($data);
        
        if (is_null($this->head)) {
            $this->head = &$newNode;
        } else {
            $currentNode = $this->head;
            while ($currentNode->getNext() !== null) {
                $currentNode = $currentNode->getNext();
            }
            $currentNode->setNext($newNode);
        }
        $this->totalNodes++;
        return true;
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

    public function totalNodes(): int
    {
        return $this->totalNodes;
    }

}