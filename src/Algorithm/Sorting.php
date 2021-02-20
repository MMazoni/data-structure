<?php

namespace MMazoni\DataStructure\Algorithm;

class Sorting
{
    public static function bubbleSort(array $array): array
    {
        $lenght = count($array);

        for ($i = 0; $i < $lenght; $i++) {
            for ($j = 0; $j < $lenght - 1; $j++) {
                if ($array[$j] > $array[$j + 1]) {
                    $temporary = $array[$j + 1];
                    $array[$j + 1] = $array[$j];
                    $array[$j] = $temporary;
                }
            }
        }
        return $array;
    }
}
