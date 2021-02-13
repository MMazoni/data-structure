<?php

use MMazoni\DataStructure\Linear\DeQueue;
use PHPUnit\Framework\TestCase;

final class DeQueueTest extends TestCase
{
    public function testCanBeEmpty(): DeQueue
    {
        $queue = new DeQueue(6);
        $this->assertTrue($queue->isEmpty());

        return $queue;
    }

    /**
     * @depends testCanBeEmpty
     */
    public function testCanEnqueueAtBack(DeQueue $queue): DeQueue
    {
        $queue->enqueueAtBack('My name is not Johnny');
        $queue->enqueueAtBack('Cloverfield');
        $queue->enqueueAtBack('Jurassic Park');
        $this->assertEquals('My name is not Johnny', $queue->peekFront());

        return $queue;
    }

    /**
     * @depends testCanEnqueueAtBack
     */
    public function testCanDequeueFromFront(DeQueue $queue): DeQueue
    {
        $this->assertEquals('My name is not Johnny', $queue->dequeueFromFront());
        $this->assertEquals('Cloverfield', $queue->dequeueFromFront());

        return $queue;
    }

    /**
     * @depends testCanDequeueFromFront
     */
    public function testCanEnqueueAtFront(DeQueue $queue): DeQueue
    {
        $queue->enqueueAtFront('Matrix');
        $queue->enqueueAtFront('Adventureland');
        $queue->enqueueAtFront('Kingsman');
        $queue->enqueueAtFront('John Wick');
        $this->assertEquals('John Wick', $queue->peekFront());
        $this->assertEquals('Jurassic Park', $queue->peekBack());

        return $queue;
    }

    /**
     * @depends testCanEnqueueAtFront
     */
    public function testCanDequeueFromBack(DeQueue $queue): void
    {
        $this->assertEquals('Jurassic Park', $queue->dequeueFromBack());
        $this->assertEquals('Matrix', $queue->dequeueFromBack());
    }
}
