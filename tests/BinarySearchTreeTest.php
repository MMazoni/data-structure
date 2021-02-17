<?php

use PHPUnit\Framework\TestCase;
use MMazoni\DataStructure\Nonlinear\BinarySearchTree;

final class BinarySearchTreeTest extends TestCase
{
    public function testCanTraverse(): BinarySearchTree
    {
        $tree = new BinarySearchTree(10);

        $tree->insert(12);
        $tree->insert(6);
        $tree->insert(3);
        $tree->insert(8);
        $tree->insert(15);
        $tree->insert(13);
        $tree->insert(36);

        $expected = '3' . PHP_EOL .
                    '6' . PHP_EOL .
                    '8' . PHP_EOL .
                    '10' . PHP_EOL .
                    '12' . PHP_EOL .
                    '13' . PHP_EOL .
                    '15' . PHP_EOL .
                    '36' . PHP_EOL;
        $this->expectOutputString($expected);
        $tree->traverse($tree->root);

        return $tree;
    }

    /**
     * @depends testCanTraverse
     */
    public function testCanSearch(BinarySearchTree $tree): BinarySearchTree {
        $this->assertEquals(13, $tree->search(13)->data());
        $this->assertEquals(6, $tree->search(6)->data());
        $this->assertNull($tree->search(11));
        $this->assertNull($tree->search(39));

        $emptyTree = new BinarySearchTree();
        $this->assertFalse($emptyTree->search(10));

        return $tree;
    }

    /**
     * @depends testCanSearch
     */
    public function testCanDeleteNode(BinarySearchTree $tree): void
    {
        $this->assertFalse($tree->delete(16));
        $this->assertTrue($tree->delete(13));
        $expected = '3' . PHP_EOL .
                    '6' . PHP_EOL .
                    '8' . PHP_EOL .
                    '10' . PHP_EOL .
                    '12' . PHP_EOL .
                    '15' . PHP_EOL .
                    '36' . PHP_EOL;
        $this->expectOutputString($expected);
        $tree->traverse($tree->root);
    }
}