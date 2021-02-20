<?php

namespace MMazoni\DataStructure\Linear;

class Node
{
    public ?Node $next = null;
    public ?Node $previous = null;

    public function __construct(public int | string | null $data = 0)
    {
    }
}
