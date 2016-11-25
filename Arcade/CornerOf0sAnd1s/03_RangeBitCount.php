<?php

/*
You are given two numbers a and b where 0 ≤ a ≤ b. Imagine you construct an array of all the integers
from a to b inclusive. You need to count the number of 1s in the binary representations of all the
numbers in the array.

Example

For a = 2 and b = 7, the output should be
rangeBitCount(a, b) = 11.

Given a = 2 and b = 7 the array is: [2, 3, 4, 5, 6, 7]. Converting the numbers to binary, we
get [10, 11, 100, 101, 110, 111], which contains 1 + 2 + 1 + 2 + 2 + 3 = 11 1s.

Input/Output

[time limit] 4000ms (php)
[input] integer a

Constraints:
0 ≤ a ≤ b.

[input] integer b

Constraints:
a ≤ b ≤ 10.

[output] integer
 */

function rangeBitCount($a, $b) {
    $result = 0;

    for ($i=$a; $i<= $b; $i++) {
        $result+=onesCount($i);
    }

    return $result;
}

/**
 * Returns number of binary 1s in the given number
 */
function onesCount($n) {
    $result = 0;

    do {
        if (($n & 1) == 1) {
            $result++; // add 1 if the rightmost bit is 1
        }
        $n = $n >> 1; // remove the rightmost bit
    } while ($n > 0);

    return $result;
}

echo onesCount(0b110101);
echo "\n";
echo rangeBitCount(2, 7);