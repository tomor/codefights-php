<?php

/*
Given integers n, l and r, find the number of ways to represent n as a sum of two
integers A and B such that l ≤ A ≤ B ≤ r.

Example

For n = 6, l = 2 and r = 4, the output should be
countSumOfTwoRepresentations2(n, l, r) = 2.

There are just two ways to write 6 as A + B, where 2 ≤ A ≤ B ≤ 4: 6 = 2 + 4 and 6 = 3 + 3.

Input/Output

[time limit] 4000ms (php)
[input] integer n

A positive integer.

Constraints:
5 ≤ n ≤ 109.

[input] integer l

A positive integer.

Constraints:
1 ≤ l ≤ r.

[input] integer r

A positive integer.

Constraints:
l ≤ r ≤ 109,
r - l ≤ 106.

[output] integer
 */

function countSumOfTwoRepresentations2($n, $l, $r) {
    $minA = $l;
    $maxA = $r;
    $nHalfDown = round($n/2, 0, PHP_ROUND_HALF_DOWN);

    // A can't be bigger then n/2, because B is always at least as big as A
    if ($maxA > $nHalfDown) {
        $maxA = $nHalfDown;
    }

    // A must be big enough so that A + B = n (A is limited from bottom by "n - maxB")
    $minAConstraint = $n-$r; // $r is maxB value
    if ($minAConstraint > $minA) {
        $minA = $minAConstraint;
    }

    // for each A value exists just one B value for which "n = A+B"
    // therefore we just have to count number of possible A values
    $result = $maxA-$minA+1;

    if ($result > 0) {
        return $result;
    } else {
        return 0;
    }
}
