<?php

namespace MMazoni\DataStructure\Stack;

interface Stack
{
    public function push(string $item): void;

    public function pop(): string;

    public function top(): string;

    public function isEmpty(): bool;
}