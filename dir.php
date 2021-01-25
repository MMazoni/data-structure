<?php

use MMazoni\DataStructure\Algorithm\Recursion;

require __DIR__ . "/vendor/autoload.php";

$files = array();

Recursion::showFiles("~/projects/php/data-structure", $files);

foreach($files as $file) {
    echo $file."\n";
}