<?php

namespace MMazoni\DataStructure\Nonlinear;

class BinarySearchTree
{
    public ?Node $root = null;

    public function __construct(int $data)
    {
        $this->root = new Node($data);
    }

    public function isEmpty(): bool
    {
        return $this->root === null;
    }

    public function insert(int $data): ?Node
    {
        if ($this->isEmpty()) {
            $node = new Node($data);
            $this->root = $node;
            return $node;
        }

        $node = $this->root;
        while ($node) {
            if ($data > $node->data) {
                if ($node->right) {
                    $node = $node->right;
                } else {
                    $node->right = new Node($data);
                    $node = $node->right;
                    break;
                }
            } elseif ($data < $node->data) {
                if ($node->left) {
                    $node = $node->left;
                } else {
                    $node->left = new Node($data);
                    $node = $node->left;
                    break;
                }
            } else {
                break;
            }
        }
        return $node;
    }

    public function traverse(?Node $node): void
    {
        if ($node) {
            if ($node->left) {
                $this->traverse($node->left);
            }
            echo $node->data . PHP_EOL;
            if ($node->right) {
                $this->traverse($node->right);
            }

        }
    }
}
