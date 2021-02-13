<?php

use MMazoni\DataStructure\Algorithm\Recursion;
use PHPUnit\Framework\TestCase;

final class RecursionTest extends TestCase
{
    public function testCanFactorial(): void
    {
        $this->assertEquals(2, Recursion::factorial(2));
        $this->assertEquals(6, Recursion::factorial(3));
        $this->assertEquals(24, Recursion::factorial(4));
    }

    public function testCanFibonacci(): void
    {
        $this->assertEquals(55, Recursion::fibonacci(10));
        $this->assertEquals(0, Recursion::fibonacci(0));
        $this->assertEquals(1, Recursion::fibonacci(1));
    }

    public function testCanGCD(): void
    {
        $this->assertEquals(4, Recursion::greatestCommonDivision(20, 24));
        $this->assertEquals(6, Recursion::greatestCommonDivision(18, 60));
        $this->assertEquals(16, Recursion::greatestCommonDivision(32, 16));
    }
}
