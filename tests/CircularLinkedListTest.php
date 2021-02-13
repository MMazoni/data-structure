<?php

use MMazoni\DataStructure\Linear\CircularLinkedList;
use PHPUnit\Framework\TestCase;

final class CircularLinkedListTest extends TestCase
{
    public function testCanInsertAtBack(): CircularLinkedList
    {
        $circular = new CircularLinkedList();
        $circular->insertAtBack(10);
        $this->assertEquals(1, $circular->totalNodes());
        $this->assertEquals(10, $circular->head()->getData());
        $circular->insertAtBack(11);
        $this->assertEquals(2, $circular->totalNodes());
        $this->assertEquals(11, $circular->head()->getNext()->getData());

        return $circular;
    }

    /**
     * @depends testCanInsertAtBack
     */
    public function testCanDisplay(CircularLinkedList $circular): void
    {
        $expected = 'Total nodes: 2' . PHP_EOL . '10' . PHP_EOL . '11' . PHP_EOL;
        $this->expectOutputString($expected);
        $circular->display();
    }
}
