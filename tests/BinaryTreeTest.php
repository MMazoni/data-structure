<?php

use PHPUnit\Framework\TestCase;
use MMazoni\DataStructure\Nonlinear\BinaryTree;
use MMazoni\DataStructure\Nonlinear\BinaryNode;

final class BinaryTreeTest extends TestCase
{
    public function testCanAddChildren(): BinaryTree
    {
        $final = new BinaryNode('Final');

        $binaryTree = new BinaryTree($final);

        $semiFinal1 = new BinaryNode('Semi Final 1');
        $semiFinal2 = new BinaryNode('Semi Final 2');
        $quarterFinal2 = new BinaryNode('Quarter Final 2');
        $quarterFinal3 = new BinaryNode('Quarter Final 3');
        $quarterFinal1 = new BinaryNode('Quarter Final 1');
        $quarterFinal4 = new BinaryNode('Quarter Final 4');

        $this->assertTrue($semiFinal1->addChildren($quarterFinal1, $quarterFinal2));
        $this->assertTrue($semiFinal2->addChildren($quarterFinal3, $quarterFinal4));

        $this->assertTrue($final->addChildren($semiFinal1, $semiFinal2));

        return $binaryTree;
    }

    /**
     * @depends testCanAddChildren
     */
    public function testCanTraverse(BinaryTree $binaryTree): void
    {
        $expected = 'Final' . PHP_EOL .
                    '-Semi Final 1' . PHP_EOL .
                    '--Quarter Final 1' . PHP_EOL .
                    '--Quarter Final 2' . PHP_EOL .
                    '-Semi Final 2' . PHP_EOL .
                    '--Quarter Final 3' . PHP_EOL .
                    '--Quarter Final 4' . PHP_EOL;
        $this->expectOutputString($expected);
        $binaryTree->traverse($binaryTree->root);
    }
}