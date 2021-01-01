<?php

class LinkedList
{
    private mixed $_firstNode;
    private int $_totalNodes = 0;

    public function insert($data): bool
    {
        $newNode = new ListNode(data: $data);
        if (is_null($newNode))
            $this->_firstNode = &$newNode;
        else {
            $currentNode = $this->_firstNode;
            while ($currentNode->next !== null) {
                $currentNode = $currentNode->next;
            }
            $currentNode = $newNode;
        }
        $this->_totalNodes++;
        return true;
    }

    public function display(): string
    {
        echo "Total nodes: {$this->_totalNodes}{PHP_EOL}";
        $currentNode = $this->_firstNode;
        while (is_null($currentNode)) {
            echo $currentNode->data . PHP_EOL;
        }
    }

}