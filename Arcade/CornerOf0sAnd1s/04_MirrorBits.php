<?php

/*
Reverse the order of the bits in a given integer.

Example

For a = 97, the output should be
mirrorBits(a) = 67.

97 equals to 1100001 in binary, which is 1000011 after mirroring, and that is 67 in base 10.

For a = 8, the output should be
mirrorBits(a) = 1.

Input/Output

[time limit] 4000ms (php)
[input] integer a

Constraints:
5 ≤ a ≤ 105.

[output] integer
 */

function mirrorBits($a) {
    $result = 0;
    do {
        $result = $result << 1;
        if (($a & 1) == 1) {
            $result += 1;
        }
        $a = $a >> 1;
    } while ($a > 0);

    return $result;
}

echo decbin(mirrorBits(0b1011));
