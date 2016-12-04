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


    // The line has to cross either the left border of the cell or the top border
    // Verify if such thing happens.

    for ($row=0; $row<$n; $row++) {
        for ($column=0; $column<$m; $column++) {
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
            }

            echo "row: $row, column: $column\n";
        }
    }

    return $crossed;
}

//echo countBlackCells(3, 4);
echo countBlackCells(66666, 88888);
