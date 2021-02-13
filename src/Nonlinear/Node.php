<?php

namespace MMazoni\DataStructure\Nonlinear;

class Node
{
    public ?Node $left;
    public ?Node $right;

    public function __construct(public mixed $data = null)
    {
        $this->data = $data;
        $this->left = null;
        $this->right = null;
    }

    public function min(): Node
    {
        $node = $this;
        while ($node->left) {
            $node = $node->left;
        }
        return $node;
    }

    public function max(): Node
    {
        $node = $this;
        while ($node->right) {
            $node = $node->right;
        }
        return $node;
    }

    public function successor(): ?Node
    {
        $node = $this;
        if ($node->right) {
            return $node->right->min();
        }

        return null;
    }

    public function predecessor(): ?Node
    {
        $node = $this;
        if ($node->left) {
            return $node->left->max();
        }

        return null;
    }
}
