<?php

/*
There're k square apple boxes full of apples. If a box is of size m, then it contains m × m apples.
You noticed two interesting properties about the boxes:

The smallest box is of size 1, the next one is of size 2,..., all the way up to size k.
Boxes that have an odd size contain only yellow apples. Boxes that have an even size contain only
red apples.
Your task is to calculate the difference between the number of red apples and the number of yellow apples.

Example

For k = 5, the output should be
appleBoxes(k) = -15.

There are 1 + 3 * 3 + 5 * 5 = 35 yellow apples and 2 * 2 + 4 * 4 = 20 red apples, thus the answer
is 20 - 35 = -15.

Input/Output

[time limit] 4000ms (php)
[input] integer k

A positive integer.

Constraints:
1 ≤ k ≤ 40.

[output] integer

The difference between the two types of apples.
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
