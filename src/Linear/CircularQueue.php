<?php

namespace MMazoni\DataStructure\Linear;

class CircularQueue implements Queue
{
    private int $front = 0;
    private int $rear = 0;

    public function __construct(
        private int $limit = 5,
        private array $queue = []
    ) {}

    public function size(): int
    {
      if ($this->rear > $this->front)
          return $this->rear - $this->front;
      return $this->limit - $this->front + $this->rear;
    }

    public function isEmpty(): bool
    {
      return $this->rear == $this->front;
    }

    public function isFull(): bool
    {
      $diff = $this->rear - $this->front;
      if ($diff === -1 || $diff === ($this->limit - 1))
          return true;
      return false;
    }

    public function enqueue(string $item): void
    {
      if ($this->isFull()) {
          throw new \OverflowException("Queue is Full.");
      } else {
          $this->queue[$this->rear] = $item;
          $this->rear = ($this->rear + 1) % $this->limit;
      }
    }

    public function dequeue(): string
    {
      $item = "";
      if ($this->isEmpty()) {
          throw new \UnderflowException("Queue is empty");
      } else {
          $item = $this->queue[$this->front];
          $this->queue[$this->front] = NULL;
          $this->front = ($this->front + 1) % $this->limit;
      }
      return $item;
    }

    public function peek(): string
    {
      return $this->queue[$this->front];
    }
}
