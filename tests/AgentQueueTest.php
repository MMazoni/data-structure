<?php

use MMazoni\DataStructure\Abstraction\AgentQueue;
use PHPUnit\Framework\TestCase;

final class AgentQueueTest extends TestCase
{
    public function testCanBeEmpty(): AgentQueue
    {
        $agents = new AgentQueue();
        $this->assertEmpty($agents->peek());
        $this->assertTrue($agents->isEmpty());

        return $agents;
    }

    /**
     * @depends testCanBeEmpty
     */
    public function testCanEnqueue(AgentQueue $agents): AgentQueue
    {
        $agents->enqueue('João');
        $agents->enqueue('Mario');
        $agents->enqueue('Maria Rita');
        $this->assertEquals('João', $agents->peek());

        return $agents;
    }

    /**
     * @depends testCanEnqueue
     */
    public function testCanDequeue(AgentQueue $agents): void
    {
        $this->assertEquals('João', $agents->dequeue());
        $this->assertEquals('Mario', $agents->dequeue());
    }
}
