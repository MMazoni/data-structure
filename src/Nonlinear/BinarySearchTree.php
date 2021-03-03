<?php

namespace MMazoni\DataStructure\Nonlinear;

class BinarySearchTree
{
    public ?Node $root = null;

    public function __construct(?int $data = null)
    {
        if (is_null($data)) {
            $this->root = null;
            return;
        }
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
            if ($data > $node->data()) {
                if ($node->right()) {
                    $node = $node->right();
                } else {
                    $node->setRight(new Node($data, $node));
                    $node = $node->right();
                    break;
                }
            } elseif ($data < $node->data()) {
                if ($node->left()) {
                    $node = $node->left();
                } else {
                    $node->setLeft(new Node($data, $node));
                    $node = $node->left();
                    break;
                }
            } else {
                break;
            }
        }
        return $node;
    }

    public function traverse(?Node $node, string $type = 'in-order'): void
    {
        match ($type) {
            'in-order' => $this->inOrder($node),
            'pre-order' => $this->preOrder($node),
            'post-order' => $this->postOrder($node)
        };
    }

    public function inOrder(?Node $node): void
    {
        if (!$node) {
            return;
        }
        if ($node->left()) {
            $this->traverse($node->left());
        }
        echo ($node->data() ?? '') . PHP_EOL;
        if ($node->right()) {
            $this->traverse($node->right());
        }
    }

    public function preOrder(?Node $node): void
    {
        if (!$node) {
            return;
        }
        echo ($node->data() ?? '') . PHP_EOL;
        if ($node->left()) {
            $this->traverse($node->left(), 'pre-order');
        }
        if ($node->right()) {
            $this->traverse($node->right(), 'pre-order');
        }
    }

    public function postOrder(?Node $node): void
    {
        if (!$node) {
            return;
        }
        if ($node->left()) {
            $this->traverse($node->left(), 'post-order');
        }
        if ($node->right()) {
            $this->traverse($node->right(), 'post-order');
        }
        echo ($node->data() ?? '') . PHP_EOL;
    }

    public function search(int $data): Node | false | null
    {
        if ($this->isEmpty()) {
            return false;
        }
        $node = $this->root;

        while ($node) {
            if ($data === $node->data()) {
                break;
            }
            if ($data > $node->data()) {
                $node = $node->right();
                continue;
            }
            $node = $node->left();
        }
        return $node;
    }

    public function delete(int $data): bool
    {
        $node = $this->search($data);
        if (!$node) {
            return false;
        }
        $node->delete();
        return true;
    }
}
