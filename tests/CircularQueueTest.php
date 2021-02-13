<?php

use MMazoni\DataStructure\Linear\CircularQueue;
use PHPUnit\Framework\TestCase;

final class CircularQueueTest extends TestCase
{
    public function testCanBeEmpty(): CircularQueue
    {
        $queue = new CircularQueue(6);
        $this->assertTrue($queue->isEmpty());

        return $queue;
    }

    /**
     * @depends testCanBeEmpty
     */
    public function testCanEnqueue(CircularQueue $queue): CircularQueue
    {
        $queue->enqueue('My name is not Johnny');
        $queue->enqueue('Cloverfield');
        $queue->enqueue('Jurassic Park');
        $this->assertEquals('My name is not Johnny', $queue->peek());

        return $queue;
    }

    /**
     * @depends testCanEnqueue
     */
    public function testCanDequeue(CircularQueue $queue): CircularQueue
    {
        $this->assertEquals('My name is not Johnny', $queue->dequeue());
        $this->assertEquals('Cloverfield', $queue->dequeue());

        return $queue;
    }

    /**
     * @depends testCanDequeue
     */
    public function testCanHaveLimit(CircularQueue $queue): void
    {
        $queue->enqueue('Matrix');
        $queue->enqueue('Adventureland');
        $queue->enqueue('Kingsman');
        $queue->enqueue('John Wick');
        $this->assertTrue($queue->isFull());
        $this->assertEquals(5, $queue->size());
        $this->assertEquals('Jurassic Park', $queue->peek());
    }
}
