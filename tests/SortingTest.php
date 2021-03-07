<?php

use MMazoni\DataStructure\Algorithm\Sorting;
use PHPUnit\Framework\TestCase;

final class SortingTest extends TestCase
{
    public function testCanBubbleSort(): array
    {
        $expected = '10,20,33,45,52,67,88,92,93,97';
        $this->expectOutputString($expected);
        $array = [20, 45, 93, 67, 10, 97, 52, 88, 33, 92];
        $sortedArray = Sorting::bubbleSort($array);
        echo implode(",", $sortedArray);

        return $array;
    }

    /**
     * @depends testCanBubbleSort
     */
    public function testCanSelectionSort(array $array): array
    {
        $expected = '10,20,33,45,52,67,88,92,93,97';
        $this->expectOutputString($expected);
        $sortedArray = Sorting::selectionSort($array);
        echo implode(",", $sortedArray);
        return $array;
    }

    /**
     * @depends testCanSelectionSort
     */
    public function testCanInsertingSort(array $array): array
    {
        $expected = '10,20,33,45,52,67,88,92,93,97';
        $this->expectOutputString($expected);
        Sorting::insertingSort($array);
        echo implode(",", $array);

        return $array;
    }

    /**
     * @depends testCanInsertingSort
     */
    public function testCanMergeSort(array $array): array
    {
        $expected = '10,20,33,45,52,67,88,92,93,97';
        $this->expectOutputString($expected);
        Sorting::mergesort($array);
        echo implode(",", $array);

        return $array;
    }

    /**
     * @depends testCanMergeSort
     */
    public function testCanQuickSort(array $array): void
    {
        $expected = '10,20,33,45,52,67,88,92,93,97';
        $this->expectOutputString($expected);
        Sorting::quickSort($array, 0, count($array)-1);
        echo implode(",", $array);
    }
}
