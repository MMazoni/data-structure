<?php

namespace MMazoni\DataStructure\Nonlinear;

class BinaryNode
{
    public ?BinaryNode $left;
    public ?BinaryNode $right;

    public function __construct(public int | string | null $data = null)
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
