<?php

namespace MMazoni\DataStructure\Nonlinear;

class TreeNode
{
    public ?array $children = [];

    public function __construct(public ?string $data = null)
    {
    }

    public function addChildren(TreeNode $node): TreeNode
    {
        $this->children[] = $node;
        return $node;
    }
}
