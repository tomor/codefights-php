<?php

/*
Presented with the integer n, find the 0-based position of the second rightmost zero bit in its binary
representation (it is guaranteed that such a bit exists), counting from right to left.

Return the value of 2position_of_the_found_bit.

Example

For n = 37, the output should be
secondRightmostZeroBit(n) = 8.

3710 = 1001012. The second rightmost zero bit is at position 3 (0-based) from the right in the
binary representation of n.
Thus, the answer is 23 = 8.

Input/Output

[time limit] 4000ms (php)
[input] integer n

Constraints:
4 ≤ n ≤ 230.

[output] integer
 */

// this method must be 1 line
function secondRightmostZeroBit($n) {
//    return secondRightmostZeroFirstAttempt($n);         // 1st solution with function
//    return leastXSignificantZero($n, 2);                // 2nd solution with functions
//    return ~$n - (~$n & (~$n-((~$n-(~$n & ~$n-1))))-1); // 3rd solution based on 2nd solution in 1 line

    // Another solution created after reading
    // http://www.catonmat.net/blog/low-level-bit-hacks-you-absolutely-must-know/
    // Needed tricks:
    // Turn on the rightmost 0-bit: y = x | (x+1)
    // Isolate the rightmost 0-bit: y = ~x & (x+1)
    return ~($n | ($n+1)) & (($n | ($n+1)) + 1);
}

/**
 * Same as leastXSignificantBit() but "searches" for Zeros
 *
 * @param int $n Input number
 * @param int $x Position of the least significant zero which should be found
 *
 * @return int
 */
function leastXSignificantZero($n, $x) {
    return leastXSignificantBit(~$n, $x);
}

/**
 * Returns number which starts with 1 where x-th significant bit is
 * See function leastSignificantBit() which is simplier.
 * This method just do the iteration.
 *
 * @param int $n Input number
 * @param int $x Position of the least significant bit which should be found
 *
 * @return int
 */
function leastXSignificantBit($n, $x) {
    $found = 0;

    for ($i=0; $i<$x; $i++) {
        $found = leastSignificantBit2($n);
        $n = $n - $found;
    }

    return $found;
}

/**
 * Returns binary number which starts as least significant bit
 * Examples:
 *  - input is 101 -> output is 1
 *  - input is 110 -> outpu is 10
 *
 * @param int $n Input number
 *
 * @return int
 */
function leastSignificantBit($n) {
    return ($n - ($n & $n-1));
}

/**
 * This works the same way as previous function because -n = ~(n-1)
 */
function leastSignificantBit2($n) {
    return $n & (-$n);
}

/**
 * Returns binary number which starts with 1 where the second rightmost
 * 0 in the given number is.
 * (basicaly this is complete solution of the main task in one function)
 * Example:
 * - 100110 -> 1000
 * - 100000 -> 10
 *
 * @param int $n Input number
 *
 * @return int
 *
 * @throws Exception When 2 rightmost zeros doesn't exist
 */
function secondRightmostZeroFirstAttempt($n) {
    $result     = 1;
    $foundZeros = 0;

    for ($i=0; $i<64; $i++) {      // do max 64 iteration .. size of max integer
        $result = 1 << $i;         // continuously increase number which is used for searching zeros
        if (($n | $result) > $n) { // if zero is found
            $foundZeros++;         // increase counter
        }

        if ($foundZeros === 2) {   // if two zeros were found
            return $result;        // return the number
        }
    }

    throw new Exception('Result not found');
}

echo decbin(secondRightmostZeroBit(0b101001));       // result : 0b10
//echo decbin(secondRightmostZeroBit(0b1110010));   // result : 0b100
