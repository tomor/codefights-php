<?php
/*
Given an integer n, return the largest number that contains exactly n digits.

Example

For n = 2, the output should be
largestNumber(n) = 99.

Input/Output

[time limit] 4000ms (php)
[input] integer n

Constraints:
1 ≤ n ≤ 7.

[output] integer

The largest integer of length n.
*/

function largestNumber($n) {
    $num = '';

    for ($i=0; $i<$n; $i++) {
        $num .= '9';
    }

    return (int)$num;
}

echo largestNumber(4);
