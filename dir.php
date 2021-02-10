<?php

use MMazoni\DataStructure\Algorithm\Recursion;

require __DIR__ . "/vendor/autoload.php";

$files = array();

Recursion::showFiles("./src/Abstraction", $files);

foreach($files as $file) {
    echo $file."\n";
}