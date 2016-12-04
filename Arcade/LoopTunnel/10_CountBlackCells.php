<?php

/*
Imagine a white rectangular grid of n rows and m columns divided into two parts by a diagonal
line running from the upper left to the lower right corner. Now let's paint the grid in two
colors according to the following rules:

A cell is painted black if it has at least one point in common with the diagonal;
Otherwise, a cell is painted white.
Count the number of cells painted black.

Example

For n = 3 and m = 4, the output should be
countBlackCells(n, m) = 6.

There are 6 cells that have at least one common point with the diagonal and therefore
are painted black.
https://codefightsuserpics.s3.amazonaws.com/tasks/countBlackCells/img/example1.jpg?_tm=1474285619565


For n = 3 and m = 3, the output should be
countBlackCells(n, m) = 7.

7 cells have at least one common point with the diagonal and are painted black.
https://codefightsuserpics.s3.amazonaws.com/tasks/countBlackCells/img/example2.jpg?_tm=1474285619707


Input/Output

[time limit] 4000ms (php)
[input] integer n

The number of rows.

Constraints:
1 ≤ n ≤ 105.

[input] integer m

The number of columns.

Constraints:
1 ≤ m ≤ 105.

[output] integer

The number of black cells.
 */

function countBlackCells($n, $m) {
    $speedX  = $m/$n;
    $speedY  = $n/$m;
    $crossed = 0;
    $columnStart = 0;

    $inOneLineMin = ceil($m/$n); // count how many cells are always minimally crossed in one line

    // The line has to cross either the left border of the cell or the top border
    // Verify if such thing happens.

    for ($row=0; $row<$n; $row++) {
        $crossedInLine = 0; // count each row separately

        for ($column=$columnStart; $column < $m; $column++) {
            // position of vertical crossing point
            // X is same for both therefor we can compare just Y (vertical position)
            // vertical position of the line is "$row -- $row+1"
            // vertical postition of the crossing point is $speedY*$cell
            $vertical = $speedY * $column;
            // Vertical position of horizontal crossing is same for top line and point
            // it's $row. Vertical position of the top line is "$cell -- $cell+1"
            // Vertical position of the crossing is $speedX*$row
            $horizontal = $speedX * $row;
            if (($vertical >= $row && $vertical <= $row+1) || // check left crossing
                ($horizontal >= $column && $horizontal <= $column+1) // check top crossing
               ) {
                $crossed++;
                $crossedInLine++;
            } elseif ($crossedInLine != 0) {
                // if we already crossed few, but this cell is not crossed, 
                // we know that no more will be crossed in this line
                break;
            }

            // speed jump ;)
            // we know how many are minimally crossed in one line - don't iterate -> jump
            if ($crossedInLine == 1) {
                $crossed       += $inOneLineMin-1;
                $crossedInLine += $inOneLineMin-1;
                $column        += $inOneLineMin-1;
            }
        }

        // in next row we don't have to start to search from the beginning - skip few
        $columnStart = $columnStart + $crossedInLine - 2;
    }

    return $crossed;
}


//echo "fast: ".countBlackCells(3, 4)."\n";
//echo "fast: ".countBlackCells(2, 10)."\n";
echo "slow: ".countBlackCells(33, 44)."\n";
//echo countBlackCells(66, 2000);



function countBlackCellsNotFinal($n, $m) {
    // make number of columns always bigger if possible
    if ($m > $n) {
        $columns = $m;
        $rows    = $n;
    } else {
        $columns = $n;
        $rows    = $m;
    }

    $speedX    = $columns/$rows; // how many cells it crosses in one line
    $inOneLine = ceil($speedX);  // round it up because we count whole cells

    // if $speedX was integer, it will be one more (cross is on the border)
    // e.g. 2/2, 4/2, 10/2 etc
    if ($inOneLine == $speedX && $speedX < $m) {
        $inOneLine++;
    }

    // now cound how often do we have this +1 count (thanks to a corner hit or thanks to the fact
    // that we have step which is longer than 0.5 and then it means that sometimes we'll hit +1
    // 1 - each row, 2 - each second row ....
    $cornerOneHitRatio = $inOneLine - 1;

    // how many +1 hits exists?
    // ... number of (rows-2)/$plusOneHitRation
    $cornerHitCount = ($rows-2)/$cornerOneHitRatio;

    // just sum it all up
    $crossed = $inOneLine * $rows + $cornerHitCount;

    return $crossed;
}
