<?php

use MMazoni\DataStructure\Linear\DoublyLinkedList;
use PHPUnit\Framework\TestCase;

final class DoublyLinkedListTest extends TestCase
{
    public function testCanInsertAtBack(): DoublyLinkedList
    {
        $doublyLinkedList = new DoublyLinkedList();
        $doublyLinkedList->insertAtBack(10);
        $this->assertEquals(1, $doublyLinkedList->totalNodes());
        $this->assertEquals(10, $doublyLinkedList->head()->getData());
        $doublyLinkedList->insertAtBack(11);
        $this->assertEquals(2, $doublyLinkedList->totalNodes());
        $this->assertEquals(11, $doublyLinkedList->head()->getNext()->getData());

        return $doublyLinkedList;
    }

    /**
     * @depends testCanInsertAtBack
     */
    public function testCanInsertAtFront(DoublyLinkedList $doublyLinkedList): DoublyLinkedList
    {
        $doublyLinkedList->insertAtFront('front');
        $this->assertEquals(3, $doublyLinkedList->totalNodes());
        $this->assertEquals('front', $doublyLinkedList->head()->getData());
        $doublyLinkedList->insertAtFront(10);
        $this->assertEquals(4, $doublyLinkedList->totalNodes());
        $this->assertEquals(10, $doublyLinkedList->head()->getData());

        return $doublyLinkedList;
    }

    /**
     * @depends testCanInsertAtFront
     */
    public function testCanInsertBeforeNode(DoublyLinkedList $doublyLinkedList): DoublyLinkedList
    {
        $doublyLinkedList->insertBeforeNode('nou', 11);
        $this->assertEquals(5, $doublyLinkedList->totalNodes());
        $this->assertEquals('nou', $doublyLinkedList->tail()->getPrev()->getData());

        return $doublyLinkedList;
    }

    /**
     * @depends testCanInsertBeforeNode
     */
    public function testCanInsertAfterNode(DoublyLinkedList $doublyLinkedList): DoublyLinkedList
    {
        $doublyLinkedList->insertAfterNode('nou', 10);
        $this->assertEquals(6, $doublyLinkedList->totalNodes());
        $this->assertEquals('nou', $doublyLinkedList->head()->getNext()->getData());

        return $doublyLinkedList;
    }

    /**
     * @depends testCanInsertAfterNode
     */
    public function testCanDeleteFirstNode(DoublyLinkedList $doublyLinkedList): DoublyLinkedList
    {
        $doublyLinkedList->deleteFirstNode();
        $this->assertEquals(5, $doublyLinkedList->totalNodes());
        $this->assertEquals('nou', $doublyLinkedList->head()->getData());

        return $doublyLinkedList;
    }

    /**
     * @depends testCanDeleteFirstNode
     */
    public function testCanDeleteLastNode(DoublyLinkedList $doublyLinkedList): DoublyLinkedList
    {
        $doublyLinkedList->deleteLastNode();
        $this->assertEquals(4, $doublyLinkedList->totalNodes());
        $this->assertEquals(10, $doublyLinkedList->head()
            ->getNext()->getNext()->getData());

        return $doublyLinkedList;
    }

    /**
     * @depends testCanDeleteLastNode
     */
    public function testCanDeleteNode(DoublyLinkedList $doublyLinkedList): void
    {
        $this->assertTrue($doublyLinkedList->deleteNode('nou'));
        $this->assertEquals(3, $doublyLinkedList->totalNodes());
        $this->assertEquals('front', $doublyLinkedList->head()->getData());
    }

    /**
     * @depends testCanDisplayForward
     */
    public function testCanDisplayBackward(DoublyLinkedList $doublyLinkedList): void
    {
        //fix this function
        $expected = 'Total nodes: 3' . PHP_EOL . 'nou' . PHP_EOL . '10' . PHP_EOL . 'front' . PHP_EOL;
        $this->expectOutputString($expected);
        $doublyLinkedList->displayBackward();
    }

}