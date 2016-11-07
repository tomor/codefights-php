<?php

/*
Some phone usage rate may be described as follows:

first minute of a call costs min1 cents,
each minute from the 2nd up to 10th (inclusive) costs min2_10 cents
each minute after 10th costs min11 cents.
You have s cents on your account before the call. What is the duration of the longest call
(in minutes rounded down to the nearest integer) you can have?

Example

For min1 = 3, min2_10 = 1, min11 = 2 and s = 20, the output should be
phoneCall(min1, min2_10, min11, s) = 14.

Here's why:

the first minute costs 3 cents, which leaves you with 20 - 3 = 17 cents;
the total cost of minutes 2 through 10 is 1 * 9 = 9, so you can talk 9 more minutes and still
have 17 - 9 = 8 cents;
each next minute costs 2 cents, which means that you can talk 8 / 2 = 4 more minutes.
Thus, the longest call you can make is 1 + 9 + 4 = 14 minutes long.

Input/Output

[time limit] 4000ms (php)
[input] integer min1

Constraints:
1 ≤ min1 ≤ 10.

[input] integer min2_10

Constraints:
1 ≤ min2_10 ≤ 10.

[input] integer min11

Constraints:
1 ≤ min11 ≤ 10.

[input] integer s

Constraints:
2 ≤ s ≤ 60.

[output] integer
*/

function phoneCall($min1, $min2_10, $min11, $s) {
    $result     = 0;
    $rest_money = $s;

    if ($s < $min1) {
        return 0;
    }

    // I can call 1 minute or mor, let's count it and calculate rest of the money I have
    $rest_money-=$min1;
    $result    +=1;

    if ($rest_money == 0) {
        return $result;
    }

    // calculate how many minutes can be called for the 2_10 price
    $next_9_mins_count = floor($rest_money/$min2_10);
    if ($next_9_mins_count > 9) {
        // situation when 10 or more then 10 minute can be reached
        $next_9_mins_count = 9;
    } elseif ($next_9_mins_count == 0) {
        // situation when no more minutes can be reached
        return $result;
    }

    // we can call at least 1 minute for the 2_10 price - let's calculate how much
    $costs_for_2_to_10 = $next_9_mins_count*$min2_10;
    $rest_money -= $costs_for_2_to_10;
    $result += $next_9_mins_count;

    // if no more minutes can be called, return result
    if ($rest_money < $min11 || $next_9_mins_count < 9) {
        return $result;
    }

    // calculate how many more minutes can be used for the rest of the money
    $next_mins_count = floor($rest_money/$min11);
    $result += $next_mins_count;

    return $result;
}


echo phoneCall(3, 1, 2, 20);
