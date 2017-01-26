<?php
//--- Day 1: No Time for a Taxicab ---
//
//Santa's sleigh uses a very high-precision clock to guide its movements, and the clock's oscillator is regulated by stars. Unfortunately, the stars have been stolen... by the Easter Bunny. To save Christmas, Santa needs you to retrieve all fifty stars by December 25th.
//
//Collect stars by solving puzzles. Two puzzles will be made available on each day in the advent calendar; the second puzzle is unlocked when you complete the first. Each puzzle grants one star. Good luck!
//
//You're airdropped near Easter Bunny Headquarters in a city somewhere. "Near", unfortunately, is as close as you can get - the instructions on the Easter Bunny Recruiting Document the Elves intercepted start here, and nobody had time to work them out further.
//
//The Document indicates that you should start at the given coordinates (where you just landed) and face North. Then, follow the provided sequence: either turn left (L) or right (R) 90 degrees, then walk forward the given number of blocks, ending at a new intersection.
//
//There's no time to follow such ridiculous instructions on foot, though, so you take a moment and work out the destination. Given that you can only walk on the street grid of the city, how far is the shortest path to the destination?
//
//For example:
//
//Following R2, L3 leaves you 2 blocks East and 3 blocks North, or 5 blocks away.
//R2, R2, R2 leaves you 2 blocks due South of your starting position, which is 2 blocks away.
//R5, L5, R5, R3 leaves you 12 blocks away.
//How many blocks away is Easter Bunny HQ?
//
//Generated input for me:
//
//R1, L4, L5, L5, R2, R2, L1, L1, R2, L3, R4, R3, R2, L4, L2, R5, L1, R5, L5, L2, L3, L1, R1, R4, R5, L3, R2, L4, L5, R1, R2, L3, R3, L3, L1, L2, R5, R4, R5, L5, R1, L190, L3, L3, R3, R4, R47, L3, R5, R79, R5, R3, R1, L4, L3, L2, R194, L2, R1, L2, L2, R4, L5, L5, R1, R1, L1, L3, L2, R5, L3, L3, R4, R1, R5, L4, R3, R1, L1, L2, R4, R1, L2, R4, R4, L5, R3, L5, L3, R1, R1, L3, L1, L1, L3, L4, L1, L2, R1, L5, L3, R2, L5, L3, R5, R3, L4, L2, R2, R4, R4, L4, R5, L1, L3, R3, R4, R4, L5, R4, R2, L3, R4, R2, R1, R2, L4, L2, R2, L5, L5, L3, R5, L5, L1, R4, L1, R1, L1, R4, L5, L3, R4, R1, L3, R4, R1, L3, L1, R1, R2, L4, L2, R1, L5, L4, L5

$input = "R1, L4, L5, L5, R2, R2, L1, L1, R2, L3, R4, R3, R2, L4, L2, R5, L1, R5, L5, L2, L3, L1, R1, R4, R5, L3, R2, L4, L5, R1, R2, L3, R3, L3, L1, L2, R5, R4, R5, L5, R1, L190, L3, L3, R3, R4, R47, L3, R5, R79, R5, R3, R1, L4, L3, L2, R194, L2, R1, L2, L2, R4, L5, L5, R1, R1, L1, L3, L2, R5, L3, L3, R4, R1, R5, L4, R3, R1, L1, L2, R4, R1, L2, R4, R4, L5, R3, L5, L3, R1, R1, L3, L1, L1, L3, L4, L1, L2, R1, L5, L3, R2, L5, L3, R5, R3, L4, L2, R2, R4, R4, L4, R5, L1, L3, R3, R4, R4, L5, R4, R2, L3, R4, R2, R1, R2, L4, L2, R2, L5, L5, L3, R5, L5, L1, R4, L1, R1, L1, R4, L5, L3, R4, R1, L3, R4, R1, L3, L1, R1, R2, L4, L2, R1, L5, L4, L5";
$route = explode(", ", $input);

function findBunny($route)
{
    // Set direction (North)
    $direction = 0;

    // Set X and Y coords
    $x = 0;
    $y = 0;

    forEach ($route as $move) {
        // First char of the move - L or R
        $moveDirection = substr($move, 0, 1);
        // Remaining chars of the move - int
        $moveDistance = substr($move, 1);

        // Setting direction int. Add 1 for right and subtract 1 for left
        switch ($moveDirection) {
            case "L":
                if ($direction == 0) {
                    $direction = 3;
                } else {
                    $direction--;
                }
                break;
            case "R":
                if ($direction == 3) {
                    $direction = 0;
                } else {
                    $direction ++;
                }
                break;
        }

        // Add or subtract the move length to X or Y depending on direction
        switch ($direction) {
            case 0:
                $x += $moveDistance;
                break;
            case 1:
                $y += $moveDistance;
                break;
            case 2:
                $x -= $moveDistance;
                break;
            case 3:
                $y -= $moveDistance;
                break;
        }
    }

    // Coordinates can be negative, but to calculate distance, must be a positive int
    if ($x < 0) {
        $x *= -1;
    }

    if ($y < 0) {
        $y *= -1;
    }

    // X is left to right, Y is up and down
    $distance = $x + $y;

    echo "Distance travelled is: " . $distance . " blocks.";
}

findBunny($route);