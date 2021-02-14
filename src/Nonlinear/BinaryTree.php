<?php

namespace MMazoni\DataStructure\Nonlinear;

class BinaryTree
{
    public ?BinaryNode $root = null;

    public function __construct(BinaryNode $node)
    {
        $this->root = $node;
    }

    public function traverse(?BinaryNode $node, int $level = 0): void
    {
        if ($node) {
            echo str_repeat('-', $level);
            echo $node->data . PHP_EOL;

            if ($node->left) {
                $this->traverse($node->left, $level + 1);
            }

            if ($node->right) {
                $this->traverse($node->right, $level + 1);
            }
        }
    }
}
