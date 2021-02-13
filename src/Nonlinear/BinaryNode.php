<?php

namespace MMazoni\DataStructure\Nonlinear;

class BinaryNode
{
    public ?BinaryNode $left;
    public ?BinaryNode $right;

    public function __construct(public mixed $data = null)
    {
        $this->data = $data;
        $this->left = null;
        $this->right = null;
    }

    public function addChildren(BinaryNode $left, BinaryNode $right): bool
    {
        $this->left = $left;
        $this->right = $right;
        return true;
    }
}
