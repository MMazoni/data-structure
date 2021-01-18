<?php

use MMazoni\DataStructure\Linear\DoublyLinkedList;
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

    public function testCanInsertBeforeNode(): void
    {
        $doublyLinkedList = new DoublyLinkedList();
        $doublyLinkedList->insertAtBack(3);
        $doublyLinkedList->insertAtBack(11);
        $doublyLinkedList->insertAtFront('7');
        $doublyLinkedList->insertAtFront(10);
        $doublyLinkedList->insertBeforeNode('nou', 11);
        $this->assertEquals(5, $doublyLinkedList->totalNodes());
        $this->assertEquals('nou', $doublyLinkedList->tail()->getPrev()->getData());
    }

    public function testCanInsertAfterNode(): void
    {
        $doublyLinkedList = new DoublyLinkedList();
        $doublyLinkedList->insertAtBack(3);
        $doublyLinkedList->insertAtBack(11);
        $doublyLinkedList->insertAtFront('7');
        $doublyLinkedList->insertAtFront(10);
        $doublyLinkedList->insertAfterNode('nou', 10);
        $this->assertEquals(5, $doublyLinkedList->totalNodes());
        $this->assertEquals('nou', $doublyLinkedList->head()->getNext()->getData());
    }

    public function testCanDeleteFirstNode(): void
    {
        $doublyLinkedList = new DoublyLinkedList();
        $doublyLinkedList->insertAtBack(3);
        $doublyLinkedList->insertAtBack(11);
        $doublyLinkedList->insertAtFront('7');
        $doublyLinkedList->insertAtFront(10);
        $doublyLinkedList->deleteFirstNode();
        $this->assertEquals(3, $doublyLinkedList->totalNodes());
        $this->assertEquals(7, $doublyLinkedList->head()->getData());
    }

    public function testCanDeleteLastNode(): void
    {
        $doublyLinkedList = new DoublyLinkedList();
        $doublyLinkedList->insertAtBack(3);
        $doublyLinkedList->insertAtBack(11);
        $doublyLinkedList->insertAtFront('7');
        $doublyLinkedList->insertAtFront(10);
        $doublyLinkedList->deleteLastNode();
        $this->assertEquals(3, $doublyLinkedList->totalNodes());
        $this->assertEquals(3, $doublyLinkedList->head()
            ->getNext()->getNext()->getData());
    }

    public function testCanDeleteNode(): void
    {
        $doublyLinkedList = new DoublyLinkedList();
        $doublyLinkedList->insertAtBack(3);
        $doublyLinkedList->insertAtBack(11);
        $doublyLinkedList->insertAtFront('7');
        $doublyLinkedList->insertAtFront(10);
        $this->assertTrue($doublyLinkedList->deleteNode(11));
        $this->assertEquals(3, $doublyLinkedList->totalNodes());
        $this->assertEquals(10, $doublyLinkedList->head()->getData());
    }
}