<?php

namespace MMazoni\DataStructure\Algorithm;

class Recursion
{
    public static function factorial(int $number): int
    {
        if ($number === 0) {
            return 1;
        }
        return $number * self::factorial($number - 1);
    }

    public static function fibonacci(int $number): int
    {
        if ($number === 0) {
            return 0;
        }
        if ($number === 1 || $number === 2) {
            return 1;
        }
        return self::fibonacci($number - 1) + self::fibonacci($number - 2);
    }

    public static function greatestCommonDivision(int $a, int $b): int
    {
        if ($b === 0)
            return $a;

        return self::greatestCommonDivision($b, $a % $b);
    }
}