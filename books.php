<?php

use MMazoni\DataStructure\Abstraction\Books;

require __DIR__ . "/vendor/autoload.php";

try {
    $programmingBooks = new Books(10);
    $programmingBooks->push("Introduction to PHP7");
    $programmingBooks->push("Mastering JavaScript");
    $programmingBooks->push("MySQL Workbench tutorial");
    echo $programmingBooks->pop()."\n";
    echo $programmingBooks->top()."\n";
} catch (Exception $e) {
    echo $e->getMessage();
}