<?php

/*
We want to turn the given integer into a number that has only one non-zero digit using a tail
rounding approach. This means that at each step we take the last non 0 digit of the number and
round it to 0 or to 10. If it's less than 5 we round it to 0 if it's larger than or equal
to 5 we round it to 10 (rounding to 10 means increasing the next significant digit by 1).
The process stops immediately once there is only one non-zero digit left.

Example

For value = 15, the output should be
rounders(value) = 20;

For value = 1234, the output should be
rounders(value) = 1000.

1234 -> 1230 -> 1200 -> 1000.

For value = 1445, the output should be
rounders(value) = 2000.

1445 -> 1450 -> 1500 -> 2000.

Input/Output

[time limit] 4000ms (php)
[input] integer value

A positive integer.

Constraints:
1 ≤ value ≤ 108.

[output] integer

The rounded number.
 */

function rounders($value) {
    $rounder = 10;

    while ($rounder < $value) {
        $digit = $value % $rounder; // it's a digit just in the first round
                                    // in the second round it's digit*10, in the third round
                                    // it's digit * 100 ... etc (damn names of variables... ;)

        if ($digit >= (5 * ($rounder / 10))) { // in the first round we test for >= 5, then >=50 etc
            $value += ($rounder - $digit);
        } else {
            $value -= $digit;
        }

        $rounder *= 10;
    }

    return $value;
}

echo rounders(15);
