<?php
/*
You are given a two-digit integer n. Return the sum of its digits.

Example

For n = 29, the output should be
addTwoDigits(n) = 11.

Input/Output

[time limit] 4000ms (php)
[input] integer n

A positive two-digit integer.

Constraints:
10 ≤ n ≤ 99.

[output] integer

The sum of the first and second digits of the input number.
*/

function addTwoDigits($n) {
    $array = str_split($n);
    return (int)$array[0]+$array[1];
}

echo addTwoDigits(25);

