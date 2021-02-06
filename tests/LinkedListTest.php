<?php

use MMazoni\DataStructure\Linear\LinkedList;
use PHPUnit\Framework\TestCase;

final class LinkedListTest extends TestCase
{
    public function testCanInsertAtBack(): LinkedList
    {
        $linkedList = new LinkedList();
        $linkedList->insertAtBack(10);
        $this->assertEquals(1, $linkedList->totalNodes());
        $this->assertEquals(10, $linkedList->head()->getData());
        $linkedList->insertAtBack(11);
        $this->assertEquals(2, $linkedList->totalNodes());
        $this->assertEquals(11, $linkedList->head()->getNext()->getData());

        return $linkedList;
    }

    /**
     * @depends testCanInsertAtBack
     */
    public function testCanInsertAtFront(LinkedList $linkedList): LinkedList
    {
        $linkedList->insertAtFront('front');
        $this->assertEquals(3, $linkedList->totalNodes());
        $this->assertEquals('front', $linkedList->head()->getData());
        $linkedList->insertAtFront(10);
        $this->assertEquals(4, $linkedList->totalNodes());
        $this->assertEquals(10, $linkedList->head()->getData());

        return $linkedList;
    }

    /**
     * @depends testCanInsertAtFront
     */
    public function testCanSearchNode(LinkedList $linkedList): LinkedList
    {
        $searchedNode = $linkedList->searchNode(10);
        $this->assertNotFalse($searchedNode);
        $this->assertEquals(10, $searchedNode->getData());

        return $linkedList;
    }

    /**
     * @depends testCanSearchNode
     */
    public function testCanInsertBeforeNode(LinkedList $linkedList): LinkedList
    {
        $linkedList->insertBeforeNode('nou', 11);
        $this->assertEquals(5, $linkedList->totalNodes());
        $searchedNode = $linkedList->searchNode('nou');
        $this->assertEquals(11, $searchedNode->getNext()->getData());

        return $linkedList;
    }

    /**
     * @depends testCanInsertBeforeNode
     */
    public function testCanInsertAfterNode(LinkedList $linkedList): LinkedList
    {
        $linkedList->insertAfterNode('ryu', 'nou');
        $this->assertEquals(6, $linkedList->totalNodes());
        $searchedNode = $linkedList->searchNode('nou');
        $this->assertEquals('ryu', $searchedNode->getNext()->getData());

        return $linkedList;
    }

    /**
     * @depends testCanInsertAfterNode
     */
    public function testCanDeleteFirstNode(LinkedList $linkedList): LinkedList
    {
        $linkedList->deleteFirstNode();
        $this->assertEquals(5, $linkedList->totalNodes());
        $this->assertEquals('front', $linkedList->head()->getData());

        return $linkedList;
    }

    /**
     * @depends testCanDeleteFirstNode
     */
    public function testCanDeleteLastNode(LinkedList $linkedList): LinkedList
    {
        $linkedList->deleteLastNode();
        $this->assertEquals(4, $linkedList->totalNodes());
        $this->assertEquals('ryu', $linkedList->head()
            ->getNext()->getNext()->getNext()->getData());

        return $linkedList;
    }

    /**
     * @depends testCanDeleteLastNode
     */
    public function testCanDeleteNode(LinkedList $linkedList): LinkedList
    {
        $this->assertTrue($linkedList->deleteNode('front'));
        $this->assertEquals(3, $linkedList->totalNodes());
        $this->assertEquals('front', $linkedList->head()->getData());

        return $linkedList;
    }

    /**
     * @depends testCanDeleteNode
     */
    public function testCanReverseList(LinkedList $linkedList): LinkedList
    {
        $linkedList->reverse();
        $this->assertEquals('ryu', $linkedList->head()->getData());
        $this->assertEquals('nou', $linkedList->head()
            ->getNext()->getData());
        $this->assertEquals(10, $linkedList->head()
            ->getNext()->getNext()->getData());
        $this->assertEquals('front', $linkedList->head()
            ->getNext()->getNext()->getNext()->getData());

        return $linkedList;
    }

    /**
     * @depends testCanReverseList
     */
    public function testCanGetNthNode(LinkedList $linkedList): LinkedList
    {
        $this->assertEquals('ryu', $linkedList->getNthNode(1)->getData());
        $this->assertEquals(10, $linkedList->getNthNode(3)->getData());

        return $linkedList;
    }

    /**
     * @depends testCanGetNthNode
     */
    public function testCanIterate(LinkedList $linkedList): void
    {
        $expected = '0 - ryu' . PHP_EOL . '1 - nou' . PHP_EOL . '2 - 10' . PHP_EOL . '3 - front' . PHP_EOL;
        $this->expectOutputString($expected);
        foreach ($linkedList as $key => $item) {
            echo $key . ' - ' . $item . PHP_EOL;
        }
    }
}
