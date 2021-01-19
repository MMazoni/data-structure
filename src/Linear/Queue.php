<?php

namespace MMazoni\DataStructure\Linear;

interface Queue
{
    public function enqueue(string $item): void;

    public function dequeue(): string;

    public function peek(): string;

    public function isEmpty(): bool;
}