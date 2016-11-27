<?php

/*
Remove a part of a given array between given 0-based indexes l and r (inclusive).

Example

For inputArray = [2, 3, 2, 3, 4, 5], l = 2 and r = 4, the output should be
removeArrayPart(inputArray, l, r) = [2, 3, 5].

Input/Output

[time limit] 4000ms (php)
[input] array.integer inputArray

Constraints:
2 ≤ inputArray.length ≤ 10,
-10 ≤ inputArray[i] ≤ 10.

[input] integer l

Left index of the part to be removed (0-based).

Constraints:
0 ≤ l ≤ r.

[input] integer r

Right index of the part to be removed (0-based).

Constraints:
l ≤ r < inputArray.length.

[output] array.integer
 */

function removeArrayPart($inputArray, $l, $r) {
    $count = count($inputArray);

    return array_merge(
        array_slice($inputArray, 0, $l),
        array_values(array_slice($inputArray, $r+1, $count-$r))
    );
}


print_r(removeArrayPart([2, 3, 2, 3, 4, 5], 2, 4));
