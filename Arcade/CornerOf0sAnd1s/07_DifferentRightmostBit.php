<?php

/*
You're given two integers, n and m. Find position of the rightmost bit in which they differ
in their binary representations (it is guaranteed that such a bit exists), counting from
right to left.

Return the value of 2position_of_the_found_bit (0-based).

Example

For n = 11 and m = 13, the output should be
differentRightmostBit(n, m) = 2.

1110 = 10112, 1310 = 11012, the rightmost bit in which they differ is the bit at
position 1 (0-based) from the right in the binary representations.
So the answer is 21 = 2.

Input/Output

[time limit] 4000ms (php)
[input] integer n

Constraints:
0 ≤ n ≤ 230.

[input] integer m

Constraints:
0 ≤ m ≤ 230,
n ≠ m.

[output] integer
 */

// Explanation:
// - find difference: XOR
// - isolate rightmost 1-bit: y = x & (-x)
function differentRightmostBit($n, $m) {
  return ($n ^ $m) & -($n ^ $m) ;
}
