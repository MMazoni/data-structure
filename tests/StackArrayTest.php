<?php

use MMazoni\DataStructure\Abstraction\BooksList;
use PHPUnit\Framework\TestCase;

final class StackArrayTest extends TestCase
{
    public function testCanPushAndPopItem(): BooksList
    {
        $stack = new BooksList();
        $stack->push('The code book');
        $this->assertEquals('The code book', $stack->pop());

        return $stack;
    }

    /**
     * @depends testCanPushAndPopItem
     */
    public function testCanHaveTop(BooksList $stack): void
    {
        $stack->push('The Life-Changing Magic of Tidying Up');
        $stack->push('Scrum');
        $stack->push('Japanese Fairy Tales');
        $this->assertEquals('Japanese Fairy Tales', $stack->top());
    }
}