<?php

use MMazoni\DataStructure\Linked\LinkedList;
use PHPUnit\Framework\TestCase;

final class LinkedListTest extends TestCase
{
    public function testCanInsertAtBack(): void
    {
        $linkedList = new LinkedList();
        $linkedList->insertAtBack(10);
        $this->assertEquals(1, $linkedList->totalNodes());
        $this->assertEquals(10, $linkedList->head()->getData());
        $linkedList->insertAtBack(11);
        $this->assertEquals(2, $linkedList->totalNodes());
        $this->assertEquals(11, $linkedList->head()->getNext()->getData());
    }

    public function testCanInsertAtFront(): void
    {
        $linkedList = new LinkedList();
        $linkedList->insertAtBack(3);
        $linkedList->insertAtBack(11);
        $linkedList->insertAtFront('front');
        $this->assertEquals(3, $linkedList->totalNodes());
        $this->assertEquals('front', $linkedList->head()->getData());
        $linkedList->insertAtFront(10);
        $this->assertEquals(4, $linkedList->totalNodes());
        $this->assertEquals(10, $linkedList->head()->getData());
    }

    public function testCanSearchNode(): void
    {
        $linkedList = new LinkedList();
        $linkedList->insertAtBack(3);
        $linkedList->insertAtBack(11);
        $linkedList->insertAtFront('front');
        $linkedList->insertAtFront(10);
        $searchedNode = $linkedList->searchNode(10);
        $this->assertNotFalse($linkedList->searchNode(10));
        $this->assertEquals(10, $searchedNode->getData());
    }

    public function testCanInsertBeforeNode(): void
    {
        $linkedList = new LinkedList();
        $linkedList->insertAtBack(3);
        $linkedList->insertAtBack(11);
        $linkedList->insertAtFront('7');
        $linkedList->insertAtFront(10);
        $linkedList->insertBeforeNode('nou', 11);
        $this->assertEquals(5, $linkedList->totalNodes());
        $searchedNode = $linkedList->searchNode('nou');
        $this->assertEquals(11, $searchedNode->getNext()->getData());
    }

    public function testCanInsertAfterNode(): void
    {
        $linkedList = new LinkedList();
        $linkedList->insertAtBack(3);
        $linkedList->insertAtBack(11);
        $linkedList->insertAtFront('7');
        $linkedList->insertAtFront(10);
        $linkedList->insertAfterNode('nou', 10);
        $this->assertEquals(5, $linkedList->totalNodes());
        $searchedNode = $linkedList->searchNode(10);
        $this->assertEquals('nou', $searchedNode->getNext()->getData());
    }

    public function testCanDeleteFirstNode(): void
    {
        $linkedList = new LinkedList();
        $linkedList->insertAtBack(3);
        $linkedList->insertAtBack(11);
        $linkedList->insertAtFront('7');
        $linkedList->insertAtFront(10);
        $linkedList->deleteFirstNode();
        $this->assertEquals(3, $linkedList->totalNodes());
        $this->assertEquals(7, $linkedList->head()->getData());
    }

    public function testCanDeleteLastNode(): void
    {
        $linkedList = new LinkedList();
        $linkedList->insertAtBack(3);
        $linkedList->insertAtBack(11);
        $linkedList->insertAtFront('7');
        $linkedList->insertAtFront(10);
        $linkedList->deleteLastNode();
        $this->assertEquals(3, $linkedList->totalNodes());
        $this->assertEquals(3, $linkedList->head()
            ->getNext()->getNext()->getData());
    }

    public function testCanDeleteNode(): void
    {
        $linkedList = new LinkedList();
        $linkedList->insertAtBack(3);
        $linkedList->insertAtBack(11);
        $linkedList->insertAtFront('7');
        $linkedList->insertAtFront(10);
        $this->assertTrue($linkedList->deleteNode(11));
        $this->assertEquals(3, $linkedList->totalNodes());
        $this->assertEquals(10, $linkedList->head()->getData());
    }

    public function testCanReverseList(): void
    {
        $linkedList = new LinkedList();
        $linkedList->insertAtBack(3);
        $linkedList->insertAtBack(11);
        $linkedList->insertAtFront('7');
        $linkedList->insertAtFront(10);
        $linkedList->reverse();
        $this->assertEquals(11, $linkedList->head()->getData());
        $this->assertEquals(3, $linkedList->head()
            ->getNext()->getData());
        $this->assertEquals(7, $linkedList->head()
            ->getNext()->getNext()->getData());
        $this->assertEquals(10, $linkedList->head()
            ->getNext()->getNext()->getNext()->getData());
    }
}
