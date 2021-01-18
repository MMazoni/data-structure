<?php

use MMazoni\DataStructure\Linear\LinkedList;

require __DIR__ . "/vendor/autoload.php";


$linkedList = new LinkedList();
$linkedList->insertAtBack(10);
$linkedList->insertAtBack(5);
$linkedList->insertAtBack(3);
$linkedList->insertAtBack(11);
$linkedList->insertAtFront('front');
$linkedList->insertAtBack(111);
$linkedList->reverse($linkedList);
$linkedList->deleteNode(5);
$linkedList->display();
