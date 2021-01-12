<?php

use MMazoni\DataStructure\Linked\DoublyLinkedList;
use PHPUnit\Framework\TestCase;

final class DoublyLinkedListTest extends TestCase
{
    public function testCanInsertAtBack(): void
    {
        $doublyLinkedList = new DoublyLinkedList();
        $doublyLinkedList->insertAtBack(10);
        $this->assertEquals(1, $doublyLinkedList->totalNodes());
        $this->assertEquals(10, $doublyLinkedList->head()->getData());
        $doublyLinkedList->insertAtBack(11);
        $this->assertEquals(2, $doublyLinkedList->totalNodes());
        $this->assertEquals(11, $doublyLinkedList->head()->getNext()->getData());
    }

    public function testCanInsertAtFront(): void
    {
        $doublyLinkedList = new DoublyLinkedList();
        $doublyLinkedList->insertAtBack(3);
        $doublyLinkedList->insertAtBack(11);
        $doublyLinkedList->insertAtFront('front');
        $this->assertEquals(3, $doublyLinkedList->totalNodes());
        $this->assertEquals('front', $doublyLinkedList->head()->getData());
        $doublyLinkedList->insertAtFront(10);
        $this->assertEquals(4, $doublyLinkedList->totalNodes());
        $this->assertEquals(10, $doublyLinkedList->head()->getData());
    }
}