<?php

namespace MMazoni\DataStructure\Nonlinear;

class Tree
{

    public ?TreeNode $root = null;
    public function __construct(TreeNode $node)
    {
        $this->root = $node;
    }

    public function traverse(?TreeNode $node, int $level = 0): bool
    {
        if ($node && $node->data && $node->children) {
            echo str_repeat("-", $level);
            echo $node->data . "\n";

            foreach ($node->children as $childNode) {
                $this->traverse($childNode, $level + 1);
            }
            return true;
        }
        return false;
    }
}
