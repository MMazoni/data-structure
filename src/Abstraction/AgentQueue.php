<?php

namespace MMazoni\DataStructure\Abstraction;

use MMazoni\DataStructure\Linear\Queue;

class AgentQueue implements Queue
{
    public function __construct(private int $limit = 20, private array $queue = [])
    {}

    public function dequeue(): string
    {
        if ($this->isEmpty()) {
            throw new \UnderflowException('Queue is empty');
        }
        return array_shift($this->queue);
    }

    public function enqueue(string $newItem): void
    {
        if (count($this->queue) >= $this->limit) {
            throw new \OverflowException('Queue is full');
        }
        array_push($this->queue, $newItem);
    }

    public function peek(): string
    {
        return current($this->queue);
    }

    public function isEmpty(): bool
    {
        return empty($this->queue);
    }
}