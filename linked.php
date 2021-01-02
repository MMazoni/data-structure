<?php

use MMazoni\DataStructure\Linked\LinkedList;

require __DIR__ . "/vendor/autoload.php";


$linkedList = new LinkedList();
$linkedList->insert(10);
$linkedList->insert(5);
$linkedList->insert(3);
$linkedList->insert(11);
$linkedList->display();
