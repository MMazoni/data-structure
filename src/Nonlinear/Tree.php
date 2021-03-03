<?php

namespace MMazoni\DataStructure\Nonlinear;

class Tree
{

    public ?TreeNode $root = null;
    public function __construct(TreeNode $node)
    {
        $this->root = $node;
    }

    public function traverse(?TreeNode $node, int $level = 0): void
    {
        if (!$node) {
            return;
        }
        echo str_repeat("-", $level);
        echo $node->data . PHP_EOL;

        foreach ($node->children as $childNode) {
            $this->traverse($childNode, $level + 1);
        }
    }
}
