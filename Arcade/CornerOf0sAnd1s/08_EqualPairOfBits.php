<?php

/*
You're given two integers, n and m. Find position of the rightmost pair of equal bits in
their binary representations (it is guaranteed that such a pair exists), counting from right to left.

Return the value of 2position_of_the_found_pair (0-based).

Example

For n = 10 and m = 11, the output should be
equalPairOfBits(n, m) = 2.

1010 = 10102, 1110 = 10112, the position of the rightmost pair of equal bits is the bit
at position 1 (0-based) from the right in the binary representations.
So the answer is 21 = 2.

Input/Output

[time limit] 4000ms (php)
[input] integer n

Constraints:
0 ≤ n ≤ 230.

[input] integer m

Constraints:
0 ≤ m ≤ 230.

[output] integer
 */

// Explanation
// XOR: Bits that are set in $a or $b but not both are set.
// Isolate the rightmost 0-bit: y = ~x & (x+1)
function equalPairOfBits($n, $m) {
    return ~($n ^ $m) & (($n ^ $m)+1);
}
