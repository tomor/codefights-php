<?php

/*
Reversing an array can be a tough task, especially for a novice programmer. Mary just
started coding, so she would like to start with something basic at first. Instead of
reversing the array entirely, she wants to swap just its first and last elements.

Given an array arr, swap its first and last elements and return the resulting array.

Example

For arr = [1, 2, 3, 4, 5], the output should be
firstReverseTry(arr) = [5, 2, 3, 4, 1].

Input/Output

[time limit] 4000ms (php)
[input] array.integer arr

Constraints:
0 ≤ arr.length ≤ 50,
-104 ≤ arr[i] ≤ 104.

[output] array.integer

Array arr with its first and its last elements swapped.
 */

function firstReverseTry($arr) {
    $count = count($arr);

    if ($count === 0) {
        return $arr;
    }

    $save          = $arr[0];
    $arr[0]        = $arr[$count-1];
    $arr[$count-1] = $save;

    return $arr;
}
