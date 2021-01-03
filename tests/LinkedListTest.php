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
}