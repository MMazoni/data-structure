<?php

namespace MMazoni\DataStructure\Algorithm;

class Sorting
{
    public static function bubbleSort(array $array): array
    {
        $lenght = count($array);

        for ($i = 0; $i < $lenght; $i++) {
            $swapped = false;
            for ($j = 0; $j < $lenght - $i - 1; $j++) {
                if ($array[$j] > $array[$j + 1]) {
                    $temporary = $array[$j + 1];
                    $array[$j + 1] = $array[$j];
                    $array[$j] = $temporary;
                    $swapped = true;
                }
            }
            if (!$swapped) {
                break;
            }
        }
        return $array;
    }

    public static function insertingSort(array &$array): void
    {
        $length = count($array);
        for ($i = 1; $i < $length; $i ++) {
            $key = $array[$i];
            $j = $i - 1;

            while ($j >= 0 && $array[$j] > $key) {
                $array[$j + 1] = $array[$j];
                $j--;
            }
            $array[$j + 1] = $key;
        }
    }
}
