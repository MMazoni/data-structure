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

        return $tree;
    }
}