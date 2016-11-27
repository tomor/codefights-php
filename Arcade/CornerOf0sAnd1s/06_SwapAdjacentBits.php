<?php

/*
You're given an arbitrary 32-bit integer n. Swap each pair of adjacent bits in its binary
representation and return the result as a decimal number.

Example

For n = 13, the output should be
swapAdjacentBits(n) = 14.

1310 = 11012 ~> 11102 = 1410.

For n = 74, the output should be
swapAdjacentBits(n) = 133.

7410 = 010010102 ~> 100001012 = 13310.
Note the preceding zero written in front of the initial number: since both numbers are
32-bit integers, they have 32 bits in their binary representation. The preceding zeros
in other cases don't matter, so they are omitted. Here, however, it does make a difference.

Input/Output

[time limit] 4000ms (php)
[input] integer n

Constraints:
0 ≤ n < 230.

[output] integer
 */

// Explanation:
// Max 32bit integers with
// odd bits 1 : 0b01010101010101010101010101010101; // == 1431655765
// even bits 1: 0b10101010101010101010101010101010; // == 2863311530
// Formula: ((($evenMask & $n) >> 1) | (($oddMask & $n) << 1))
function swapAdjacentBits($n) {
  return (((0b10101010101010101010101010101010 & $n) >> 1) | ((0b01010101010101010101010101010101 & $n) << 1));
}


// How I get to the solution:
//$oddMask  = 0b01010101010101010101;
//$evenMask = 0b10101010101010101010;
//$num=0b1111;
// take odd bits, and move them left
//$oddBits = (($oddMask & $num) << 1);
//echo decbin($oddBits);
//take even bits and move them right
//$evenBits = (($evenMask & $num) >> 1);
//echo decbin($evenBits);
// now "sum" it
//echo decbin($evenBits | $oddBits);

echo swapAdjacentBits(13);
