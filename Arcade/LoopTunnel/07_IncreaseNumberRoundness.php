<?php

/*
Define an integer's roundness as the number of trailing zeroes in it.

Given an integer n, check if it's possible to increase n's roundness by swapping some pair of its digits.

Example

For n = 902200100, the output should be
increaseNumberRoundness(n) = true.

One of the possible ways to increase roundness of n is to swap digit 1 with digit 0 preceding it:
roundness of 902201000 is 3, and roundness of n is 2.

For instance, one may swap the leftmost 0 with 1.

For n = 11000, the output should be
increaseNumberRoundness(n) = false.

Roundness of n is 3, and there is no way to increase it.

Input/Output

[time limit] 4000ms (php)
[input] integer n

A positive integer.

Constraints:
100 ≤ n ≤ 109.

[output] boolean

true if it's possible to increase n's roundness, false otherwise.
 */

function increaseNumberRoundness($n) {
    $nonZeroFound = false;
    $digit        = null;

    // to increase roundnes we need to find (from right to left)
    // at first a non-zero digit and then a zero
    while ($n) {
        $digit = $n % 10; // get the most rigth digit

        if ($digit !== 0) {
            $nonZeroFound = true; // find the first non-zero digit
        }

        if ($nonZeroFound && $digit === 0) {
            return true;
        }

        $n = ($n-$digit)/10; // remove the last digit from the number
    }

    return false;
}
