<?php

use PHPUnit\Framework\TestCase;
use MMazoni\DataStructure\Nonlinear\Tree;
use MMazoni\DataStructure\Nonlinear\TreeNode;

final class TreeTest extends TestCase
{
    public function testTreeCanAddChildren(): Tree
    {
        $ceo = new TreeNode("CEO");
        $tree = new Tree($ceo);
        $cto = new TreeNode("CTO");
        $cfo = new TreeNode("CFO");
        $cmo = new TreeNode("CMO");
        $coo = new TreeNode("COO");
        $this->assertEquals($cto, $ceo->addChildren($cto));
        $this->assertEquals($cfo, $ceo->addChildren($cfo));
        $this->assertEquals($cmo, $ceo->addChildren($cmo));
        $this->assertEquals($coo, $ceo->addChildren($coo));
        $seniorArchitect = new TreeNode("Senior Architect");
        $softwareEngineer = new TreeNode("Software Engineer");
        $userInterfaceDesigner = new TreeNode("User Interface Designer");
        $qualityAssuranceEngineer = new TreeNode("Quality Assurance Engineer");

        $this->assertEquals($seniorArchitect, $cto->addChildren($seniorArchitect));
        $this->assertEquals($softwareEngineer, $seniorArchitect->addChildren($softwareEngineer));
        $this->assertEquals($qualityAssuranceEngineer, $cto->addChildren($qualityAssuranceEngineer));
        $this->assertEquals($userInterfaceDesigner, $cto->addChildren($userInterfaceDesigner));

        return $tree;
    }

    /**
     * @depends testTreeCanAddChildren
     */
    public function testTreeCanTraverse(Tree $tree): Tree
    {
        $expected = 'CEO' . PHP_EOL .
                    '-CTO' . PHP_EOL .
                    '--Senior Architect' . PHP_EOL .
                    '---Software Engineer' . PHP_EOL .
                    '--Quality Assurance Engineer' . PHP_EOL .
                    '--User Interface Designer' . PHP_EOL .
                    '-CFO' . PHP_EOL .
                    '-CMO' . PHP_EOL .
                    '-COO' . PHP_EOL;
        $this->expectOutputString($expected);
        $tree->traverse($tree->root);
        return $tree;
    }
}
