<?php
/*
You found two items in a treasure chest! The first item weighs weight1 and is worth value1, and the second item weighs weight2 and is worth value2. What is the total maximum value of the items you can take with you, assuming that your max weight capacity is maxW and you can't come back for the items later?

Example

For value1 = 10, weight1 = 5, value2 = 6, weight2 = 4 and maxW = 8, the output should be
knapsackLight(value1, weight1, value2, weight2, maxW) = 10.

You can only carry the first item.

For value1 = 10, weight1 = 5, value2 = 6, weight2 = 4 and maxW = 9, the output should be
knapsackLight(value1, weight1, value2, weight2, maxW) = 16.

You're strong enough to take both of the items with you.

Input/Output

[time limit] 4000ms (php)
[input] integer value1

Constraints:
2 ≤ value1 ≤ 20.

[input] integer weight1

Constraints:
2 ≤ weight1 ≤ 10.

[input] integer value2

Constraints:
2 ≤ value2 ≤ 20.

[input] integer weight2
 */

function knapsackLight($value1, $weight1, $value2, $weight2, $maxW) {
    if ($weight1+$weight2 <= $maxW) {
        // if possible take both
        return $value1+$value2;
    } elseif ($value1 > $value2 && $weight1 <= $maxW) {
        // take the first one if it's more valuable and if possible with regard to weight
        return $value1;
    } elseif ($weight2 <= $maxW) {
        // take the second one if regarding the weight possible
        return $value2;
    } elseif ($weight1 <= $maxW) {
        // if the first one was not valuable but the second one was not taken try the first one
        return $value1;
    } else {
        return 0;
    }
}

echo knapsackLight(10, 5, 6, 4, 8);
