<?php

namespace MMazoni\DataStructure\Nonlinear;

class TreeNode
{
    public $children = [];

    public function __construct(public ?string $data = null)
    {}

    public function addChildren(TreeNode $node): TreeNode
    {
        $this->children[] = $node;
        return $node;
    }
}
