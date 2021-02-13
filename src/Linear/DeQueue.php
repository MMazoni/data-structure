<?php

namespace MMazoni\DataStructure\Linear;

use MMazoni\DataStructure\Linear\LinkedList;

class DeQueue
{

    private LinkedList $queue;

    public function __construct(private int $limit = 20) {
        $this->queue = new LinkedList();
    }

    public function dequeueFromFront(): ?string
    {
        if ($this->isEmpty()) {
            throw new \UnderflowException('Queue is empty');
        }
        $lastItem = $this->peekFront();
        $this->queue->deleteFirstNode();
        return $lastItem;
    }

    public function dequeueFromBack(): ?string
    {
        if ($this->isEmpty()) {
            throw new \UnderflowException('Queue is empty');
        }
        $lastItem = $this->peekBack();
        $this->queue->deleteLastNode();
        return $lastItem;
    }

    public function enqueueAtBack(string $newItem): void
    {
        if ($this->queue->totalNodes() >= $this->limit) {
            throw new \OverflowException('Queue is full');
        }
        $this->queue->insertAtBack($newItem);
    }

    public function enqueueAtFront(string $newItem): void
    {
        if ($this->queue->totalNodes() >= $this->limit) {
            throw new \OverflowException('Queue is full');
        }
        $this->queue->insertAtFront($newItem);
    }

    public function peekFront(): ?string
    {
        return $this->queue->getNthNode(1)?->getData();
    }

    public function peekBack(): ?string
    {
        return $this->queue->getNthNode($this->queue->totalNodes())?->getData();
    }

    public function isEmpty(): bool
    {
        return $this->queue->totalNodes() == 0;
    }
}
