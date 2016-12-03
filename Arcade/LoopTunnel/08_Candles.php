<?php

/*
When a candle finishes burning it leaves a leftover. makeNew leftovers can be combined to make a new
candle, which, when burning down, will in turn leave another leftover.

You have candlesNumber candles in your possession. What's the total number of candles you can burn,
assuming that you create new candles as soon as you have enough leftovers?

Example

For candlesNumber = 5 and makeNew = 2, the output should be
candles(candlesNumber, makeNew) = 9.

Here is what you can do to burn 9 candles:

burn 5 candles, obtain 5 leftovers;
create 2 more candles, using 4 leftovers (1 leftover remains);
burn 2 candles, end up with 3 leftovers;
create another candle using 2 leftovers (1 leftover remains);
burn the created candle, which gives another leftover (2 leftovers in total);
create a candle from the remaining leftovers;
burn the last candle.
Thus, you can burn 5 + 2 + 1 + 1 = 9 candles, which is the answer.

Input/Output

[time limit] 4000ms (php)
[input] integer candlesNumber

The number of candles you have in your possession.

Constraints:
1 ≤ candlesNumber ≤ 15.

[input] integer makeNew

The number of leftovers that you can use up to create a new candle.

Constraints:
2 ≤ makeNew ≤ 5.

[output] integer
 */

function candles($candlesNumber, $makeNew) {
    $leftovers    = 0;
    $totalCandles = 0;
    $newCandles   = 1; //init to be able to start the while loop

    // $candlesNumber variable holds actual amount of candles we currently have
    while ($newCandles >= 1) {
        $totalCandles += $candlesNumber;
        $leftovers    += $candlesNumber;            // how many leftowers do we have in this round? - same as candles
        $candlesNumber = 0;                         // all burned
        $newCandles    = floor($leftovers/$makeNew);// create new candles
        $leftovers    -= ($newCandles*$makeNew);    // decrease leftowers because new candles were created
        $candlesNumber = $newCandles;               
    }
    
    return $totalCandles;
}

echo candles(5, 2);
