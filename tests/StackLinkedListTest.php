<?php

use MMazoni\DataStructure\Abstraction\BooksList;
use PHPUnit\Framework\TestCase;

final class StackLinkedListTest extends TestCase
{
    public function testCanPushAndPopItem(): void
    {
        $stack = new BooksList();
        $stack->push('The art of war');
        $this->assertEquals('The art of war', $stack->pop());
    }

    public function testCanHaveTop(): void
    {
        $stack = new BooksList();
        $stack->push('The Lord of Rings');
        $stack->push('14 Habits of Highly Productive Developers');
        $stack->push('Atomic Habits');
        $this->assertEquals('Atomic Habits', $stack->top());
    }
}