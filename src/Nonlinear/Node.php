<?php

namespace MMazoni\DataStructure\Nonlinear;

class Node
{
    private ?Node $left;
    private ?Node $right;

    public function __construct(private ?int $data = null, private ?Node $parent = null)
    {
        $this->data = $data;
        $this->parent = $parent;
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
    public function delete(): void
    {
        $node = $this;
        if (!$node->left && !$node->right) {
            if ($node->parent->left === $node) {
                $node->parent->left = null;
            } else {
                $node->parent->right = null;
            }
        } elseif ($node->left && $node->right) {
            $successor = $node->successor();
            $node->data = $successor?->data;
            $successor?->delete();
        } elseif ($node->left) {
            if ($node->parent->left === $node) {
                $node->parent->left = $node->left;
                $node->left->parent = $node->parent->left;
            } else {
                $node->parent->right = $node->left;
                $node->left->parent = $node->parent->right;
            }
            $node->left = null;
        } else {
            if ($node->parent->left === $node) {
                $node->parent->left = $node->right;
                $node->right->parent = $node->parent->left;
            } else {
                $node->parent->right = $node->right;
                $node->right->parent = $node->parent->right;
            }
            $node->right = null;
        }
    }

    public function data(): int
    {
        return $this->data;
    }

    public function setData(int $data): void
    {
        $this->data = $data;
    }

    public function left(): ?Node
    {
        return $this->left;
    }

    public function setLeft(?Node $node): void
    {
        $this->left = $node;
    }

    public function right(): ?Node
    {
        return $this->right;
    }

    public function setRight(?Node $node): void
    {
        $this->right = $node;
    }

    public function parent(): ?Node
    {
        return $this->parent;
    }

    public function setParent(?Node $node): void
    {
        $this->parent = $node;
    }
}
