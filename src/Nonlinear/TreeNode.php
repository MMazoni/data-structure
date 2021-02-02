<?php

class TreeNode
{
    public $children = [];

    public function __construct(public ?string $data = null)
    {}

    public function addChildren(TreeNode $node)
    {
        $this->children[] = $node;
    }
}
