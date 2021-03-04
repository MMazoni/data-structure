<?php

use MMazoni\DataStructure\Algorithm\Sorting;
use PHPUnit\Framework\TestCase;

final class SortingTest extends TestCase
{
    public function testCanSortingArray(): void
    {
        $expected = '10,20,33,45,52,67,88,92,93,97';
        $this->expectOutputString($expected);
        $array = [20, 45, 93, 67, 10, 97, 52, 88, 33, 92];
        $sortedArray = Sorting::bubbleSort($array);
        echo implode(",", $sortedArray);
    }

    public function testCanInsertingSort(): void
    {
        $expected = '10,20,33,45,52,67,88,92,93,97';
        $this->expectOutputString($expected);
        $array = [20, 45, 93, 67, 10, 97, 52, 88, 33, 92];
        Sorting::insertingSort($array);
        echo implode(",", $array);
    }
}
