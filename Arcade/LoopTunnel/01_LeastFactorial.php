<?php

/*
Given an integer n, find the minimal k such that

k = m! (where m! = 1 * 2 * ... * m) for some integer m;
k >= n.
In other words, find the smallest factorial which is not less than n.

Example

For n = 17, the output should be
leastFactorial(n) = 24.

17 < 24 = 4! = 1 * 2 * 3 * 4, while 3! = 1 * 2 * 3 = 6 < 17).

Input/Output

[time limit] 4000ms (php)
[input] integer n

A positive integer.

Constraints:
1 ≤ n ≤ 120.

[output] integer
 */

function leastFactorial($n) {
    $maxLoops = 6; // !6 = 720, that's enough for current task regarding Constraints
    $fact     = 1; // init of result

    for ($i=2; $i <= $maxLoops; $i++) {
        if ($fact >= $n) {
            return $fact;
        }

        $fact *= $i;
    }

    throw new \Exception('Fail, result not found');
}
