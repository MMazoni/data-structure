<?php

namespace MMazoni\DataStructure\Nonlinear;

class Tree
{

    public $root = NULL;
    public function __construct(TreeNode $node)
    {
        $this->root = $node;
    }

    public function traverse(TreeNode $node, int $level = 0): bool
    {
        if ($node) {
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
