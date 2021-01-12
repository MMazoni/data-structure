<?php

use MMazoni\DataStructure\Linked\CircularLinkedList;
use PHPUnit\Framework\TestCase;

final class CircularLinkedListTest extends TestCase
{
    public function testCanInsertAtBack(): void
    {
        $circular = new CircularLinkedList();
        $circular->insertAtBack(10);
        $this->assertEquals(1, $circular->totalNodes());
        $this->assertEquals(10, $circular->head()->getData());
        $circular->insertAtBack(11);
        $this->assertEquals(2, $circular->totalNodes());
        $this->assertEquals(11, $circular->head()->getNext()->getData());
    }
}